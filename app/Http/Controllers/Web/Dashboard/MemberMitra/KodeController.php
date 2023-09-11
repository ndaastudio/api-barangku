<?php

namespace App\Http\Controllers\Web\Dashboard\MemberMitra;

use App\Models\Akun;
use App\Models\Mitra;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\FormKodeDaftar;

class KodeController extends Controller
{
    public function index()
    {
        $idMitra = Mitra::where('user_id', Auth::user()->id)->value('id');
        $queryAdmin = Akun::where('status_akun', 0)->where('status_bayar', 0)->latest()->get();
        $queryMitra = Akun::where('status_akun', 0)->where('status_bayar', 0)->where('mitra_id', $idMitra)->latest()->get();
        $data = [
            'breadcrumbs' => [
                ['name' => 'Kode Daftar', 'url' => '/member/kode'],
            ],
            'isActive' => 'member.kode',
            'members' => Auth::user()->role === 'Admin' ? $queryAdmin : $queryMitra,
        ];
        return view('web.dashboard.MemberMitra.kode-daftar.index', $data);
    }

    public function store(FormKodeDaftar $request)
    {
        try {
            DB::beginTransaction();
            $mitra = Mitra::where('user_id', Auth::user()->id)->first();
            if (!$mitra->harga_kode) {
                return redirect()->back()->with('error', 'Atur harga Kode Daftar terlebih dahulu');
            }
            if ($mitra->kuota_kode === 0) {
                return redirect()->back()->with('error', 'Kuota Kode Daftar telah habis');
            }
            $generatedKodeDaftar = false;
            while (!$generatedKodeDaftar) {
                $kodeDaftar = Str::lower(Str::random(6));
                $kode = Akun::where('kode_daftar', $kodeDaftar);
                if (!$kode->exists()) {
                    $generatedKodeDaftar = true;
                }
            }
            Akun::create([
                'mitra_id' => $mitra->id,
                'nomor_telepon' => $request->nomor_telepon,
                'kode_daftar' => $kodeDaftar,
                'jenis_akun' => 1,
            ]);
            $mitra->update([
                'kuota_kode' => $mitra->kuota_kode - 1,
            ]);
            DB::commit();
            return redirect()->back()->with('success', 'Kode daftar telah dibuat');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan pada database atau server: ' . $e->getMessage());
        }
    }

    public function update(string $id)
    {
        $isTelahBayar = Akun::find($id)->update(['status_bayar' => 1]);
        if ($isTelahBayar) {
            return redirect()->back()->with('success', 'Member terkonfirmasi telah bayar');
        }
        return redirect()->back()->with('error', 'Terjadi kesalahan pada database atau server');
    }

    public function destroy(string $id)
    {
        $isDeleted = Akun::find($id)->delete();
        if ($isDeleted) {
            return redirect()->back()->with('success', 'Kode daftar telah dihapus');
        }
        return redirect()->back()->with('error', 'Terjadi kesalahan pada database atau server');
    }
}
