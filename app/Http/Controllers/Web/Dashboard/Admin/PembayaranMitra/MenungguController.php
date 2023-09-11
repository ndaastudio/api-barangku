<?php

namespace App\Http\Controllers\Web\Dashboard\Admin\PembayaranMitra;

use App\Models\Pembayaran;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Mitra;

class MenungguController extends Controller
{
    public function index()
    {
        $data = [
            'breadcrumbs' => [
                ['name' => 'Menunggu Konfirmasi', 'url' => '/pembayaran-mitra/menunggu'],
            ],
            'isActive' => 'pembayaran-mitra.menunggu',
            'pembayarans' => Pembayaran::where('status', 0)->whereNotNull('tanggal_transfer')->latest()->get(),
        ];
        return view('web.dashboard.admin.PembayaranMitra.menunggu.index', $data);
    }

    public function terima(string $id)
    {
        try {
            DB::beginTransaction();
            $pembayaran = Pembayaran::find($id);
            $mitra = Mitra::where('id', $pembayaran->mitra_id);
            $pembayaran->update(['status' => 1]);
            $mitra->update(['kuota_kode' => $mitra->first()->kuota_kode + $pembayaran->total_kuota]);
            DB::commit();
            return redirect()->back()->with('success', 'Pembayaran telah diterima');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan pada database atau server: ' . $e->getMessage());
        }
    }

    public function tolak(string $id)
    {
        $isTolak = Pembayaran::find($id)->update(['status' => 2]);
        if ($isTolak) {
            return redirect()->back()->with('success', 'Pembayaran telah ditolak');
        }
        return redirect()->back()->with('error', 'Terjadi kesalahan pada database atau server');
    }
}
