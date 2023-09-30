<?php

namespace App\Http\Controllers\Web\Dashboard\Admin\PembayaranMitra;

use App\Models\Mitra;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DiterimaController extends Controller
{
    public function index()
    {
        $data = [
            'breadcrumbs' => [
                ['name' => 'Pembayaran Diterima', 'url' => '/pembayaran-mitra/diterima'],
            ],
            'isActive' => 'pembayaran-mitra.diterima',
            'pembayarans' => Pembayaran::where('status', 1)->whereNotNull('tanggal_transfer')->latest()->get(),
        ];
        return view('web.dashboard.admin.PembayaranMitra.diterima.index', $data);
    }

    public function batal(string $id)
    {
        try {
            DB::beginTransaction();
            $pembayaran = Pembayaran::find($id);
            $mitra = Mitra::where('id', $pembayaran->mitra_id);
            $pembayaran->update(['status' => 0]);
            $diffKuota = $mitra->first()->kuota_kode - $pembayaran->total_kuota;
            if ($diffKuota < 0) {
                $mitra->update(['kuota_kode' => 0]);
            } else {
                $mitra->update(['kuota_kode' => $diffKuota]);
            }
            DB::commit();
            return redirect()->back()->with('success', 'Pembayaran dibatalkan dari status diterima');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan pada database atau server: ' . $e->getMessage());
        }
    }
}
