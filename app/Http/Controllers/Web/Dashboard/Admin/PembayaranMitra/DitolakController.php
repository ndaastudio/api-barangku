<?php

namespace App\Http\Controllers\Web\Dashboard\Admin\PembayaranMitra;

use App\Models\Mitra;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DitolakController extends Controller
{
    public function index()
    {
        $data = [
            'breadcrumbs' => [
                ['name' => 'Pembayaran Ditolak', 'url' => '/pembayaran-mitra/ditolak'],
            ],
            'isActive' => 'pembayaran-mitra.ditolak',
            'pembayarans' => Pembayaran::where('status', 2)->whereNotNull('tanggal_transfer')->latest()->get(),
        ];
        return view('web.dashboard.admin.PembayaranMitra.ditolak.index', $data);
    }

    public function batal(string $id)
    {
        $isBatal = Pembayaran::find($id)->update(['status' => 0]);
        if ($isBatal) {
            return redirect()->back()->with('success', 'Pembayaran dibatalkan dari status ditolak');
        }
        return redirect()->back()->with('error', 'Terjadi kesalahan pada database atau server');
    }
}
