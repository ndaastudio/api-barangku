<?php

namespace App\Http\Controllers\Web\Dashboard\MemberMitra;

use App\Models\Akun;
use App\Models\Mitra;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\GambarBarang;
use App\Models\ReqNonaktifAkun;
use Illuminate\Support\Facades\Auth;

class MemberAktifController extends Controller
{
    public function index()
    {
        $idMitra = Mitra::where('user_id', Auth::user()->id)->value('id');
        $queryAdmin = Akun::where('status_akun', 1)->where('status_bayar', 1)->latest()->get();
        $queryMitra = Akun::where('status_akun', 1)->where('status_bayar', 1)->where('mitra_id', $idMitra)->latest()->get();
        $data = [
            'breadcrumbs' => [
                ['name' => 'Member Aktif', 'url' => '/member/aktif'],
            ],
            'isActive' => 'member.aktif',
            'members' => Auth::user()->role === 'Admin' ? $queryAdmin : $queryMitra,
        ];
        return view('web.dashboard.MemberMitra.member-aktif.index', $data);
    }

    public function update(string $id)
    {
        $isUpdated = Akun::find($id)->update(['status_akun' => 2]);
        if ($isUpdated) {
            return redirect()->back()->with('success', 'Akun member telah dinonaktifkan');
        }
        return redirect()->back()->with('error', 'Terjadi kesalahan pada database atau server');
    }

    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $barang = Barang::where('akun_id', $id);
            $gambarBarang = GambarBarang::where('akun_id', $id);
            $reqNonaktifkanAkun = ReqNonaktifAkun::where('akun_id', $id);
            if ($barang->exists()) {
                $barang->delete();
            }
            if ($gambarBarang->exists()) {
                $gambarBarang->delete();
            }
            if ($reqNonaktifkanAkun->exists()) {
                $reqNonaktifkanAkun->delete();
            }
            Akun::find($id)->delete();
            DB::commit();
            return redirect()->back()->with('success', 'Akun member telah dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan pada database atau server: ' . $e->getMessage());
        }
    }

    public function perpanjangMasaAktif(string $id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $akun = Akun::find($id);
        $isUpdated = $akun->update(['limit_akun' => date('Y-m-d H:i:s', strtotime($akun->limit_akun . ' +365 days'))]);
        if ($isUpdated) {
            return redirect()->back()->with('success', 'Masa aktif akun member telah diperpanjang');
        }
        return redirect()->back()->with('error', 'Terjadi kesalahan pada database atau server');
    }
}
