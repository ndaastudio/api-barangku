<?php

namespace App\Http\Controllers\Web\Dashboard\Mitra\Pengaturan\KuotaMarketing;

use App\Models\Mitra;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TambahController extends Controller
{
    public function index()
    {
        $data = [
            'breadcrumbs' => [
                ['name' => 'Tambah Kuota', 'url' => '/kuota-marketing/tambah'],
            ],
            'isActive' => 'kuota-marketing.tambah',
        ];
        return view('web/dashboard/mitra/Pengaturan/kuota-marketing/tambah/index', $data);
    }

    public function store(Request $request)
    {
        $idMitra = Mitra::where('user_id', Auth::user()->id)->value('id');
        $kuotaPaket = [
            'Pemula' => 5,
            'Berpengalaman' => 10,
            'Profesional' => 25,
        ];
        $hargaPaket = [
            'Pemula' => 100000,
            'Berpengalaman' => 250000,
            'Profesional' => 600000,
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
            return redirect()->back()->with('success', 'Silahkan lengkapi data dan lakukan pembayaran di menu Konfirmasi Pembayaran');
        }
        return redirect()->back()->with('error', 'Terjadi kesalahan pada database atau server');
    }
}
