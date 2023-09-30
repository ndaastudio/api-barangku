<?php

namespace App\Http\Controllers\Web\Dashboard\Mitra\Pengaturan\KuotaMarketing;

use App\Models\Mitra;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormAturPembayaran;
use Illuminate\Support\Facades\Auth;

class AturPembayaranController extends Controller
{
    public function index()
    {
        $data = [
            'breadcrumbs' => [
                ['name' => 'Atur Pembayaran', 'url' => '/kuota-marketing/atur-pembayaran'],
            ],
            'isActive' => 'kuota-marketing.atur-pembayaran',
            'mitra' => Mitra::where('user_id', Auth::user()->id)->first(),
        ];
        return view('web/dashboard/mitra/Pengaturan/kuota-marketing/atur-pembayaran/index', $data);
    }

    public function update(FormAturPembayaran $request)
    {
        $isUpdated = Mitra::where('user_id', Auth::user()->id)->update([
            'nama_rekening' => $request->nama_rekening,
            'nama_bank' => $request->nama_bank,
            'nomor_rekening' => $request->nomor_rekening,
            'harga_kode' => $request->harga_kode,
        ]);
        if ($isUpdated) {
            return redirect()->back()->with('success', 'Pembayaran Anda telah diatur');
        }
        return redirect()->back()->with('error', 'Terjadi kesalahan pada database atau server');
    }
}
