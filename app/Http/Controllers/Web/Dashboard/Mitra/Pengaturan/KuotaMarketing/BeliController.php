<?php

namespace App\Http\Controllers\Web\Dashboard\Mitra\Pengaturan\KuotaMarketing;

use App\Models\Mitra;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BeliController extends Controller
{
    public function index()
    {
        $data = [
            'breadcrumbs' => [
                ['name' => 'Pembelian', 'url' => '/kuota-marketing/beli'],
            ],
            'isActive' => 'kuota-marketing.beli',
        ];
        return view('web/dashboard/mitra/Pengaturan/kuota-marketing/beli/index', $data);
    }

    public function store(Request $request)
    {
        $idMitra = Mitra::where('user_id', Auth::user()->id)->value('id');
        $kuotaPaket = [
            'Pemula' => 4,
            'Berpengalaman' => 10,
            // 'Profesional' => 25,
        ];
        $hargaPaket = [
            'Pemula' => 100000,
            'Berpengalaman' => 200000,
            // 'Profesional' => 600000,
        ];
        $kodePembayaran = rand(100, 999);
        $isCreated = Pembayaran::create([
            'mitra_id' => $idMitra,
            'jenis_paket' => $request->jenis_paket,
            'total_kuota' => $kuotaPaket[$request->jenis_paket],
            'kode_pembayaran' => $kodePembayaran,
            'nominal' => $hargaPaket[$request->jenis_paket] + $kodePembayaran,
        ]);
        if ($isCreated) {
            return redirect()->back()->with('success', 'Silahkan lengkapi data dan lakukan pembayaran di menu Pembayaran');
        }
        return redirect()->back()->with('error', 'Terjadi kesalahan pada database atau server');
    }
}
