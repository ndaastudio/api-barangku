<?php

namespace App\Http\Controllers\Web\Dashboard\MemberMitra;

use App\Models\Akun;
use App\Models\Mitra;
use App\Models\Barang;
use App\Models\GambarBarang;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ReqHapusAkun;
use Illuminate\Support\Facades\Auth;

class MemberNonaktifController extends Controller
{
    public function index()
    {
        $idMitra = Mitra::where('user_id', Auth::user()->id)->value('id');
        $queryAdmin = Akun::where('status_akun', 2)->where('status_bayar', 1)->latest()->get();
        $queryMitra = Akun::where('status_akun', 2)->where('status_bayar', 1)->where('mitra_id', $idMitra)->latest()->get();
        $data = [
            'breadcrumbs' => [
                ['name' => 'Member Nonaktif', 'url' => '/member/nonaktif'],
            ],
            'isActive' => 'member.nonaktif',
            'members' => Auth::user()->role === 'Admin' ? $queryAdmin : $queryMitra,
        ];
        return view('web.dashboard.MemberMitra.member-nonaktif.index', $data);
    }

    public function update(string $id)
    {
        try {
            DB::beginTransaction();
            $akun = Akun::find($id);
            date_default_timezone_set('Asia/Jakarta');
            $currentDate = date('Y-m-d H:i:s');
            $expiredDate = date('Y-m-d H:i:s', strtotime($akun->limit_akun));
            if ($expiredDate < $currentDate) {
                $akun->update([
                    'status_akun' => 1,
                    'limit_akun' => date('Y-m-d H:i:s', strtotime('+365 days')),
                ]);
            } else {
                $akun->update([
                    'status_akun' => 1,
                ]);
            }
            DB::commit();
            return redirect()->back()->with('success', 'Akun member telah diaktifkan kembali');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan pada database atau server: ' . $e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $barang = Barang::where('akun_id', $id);
            $gambarBarang = GambarBarang::where('akun_id', $id);
            $reqNonaktifkanAkun = ReqHapusAkun::where('akun_id', $id);
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
}
