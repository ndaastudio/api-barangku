<?php

namespace App\Http\Controllers\Web\Dashboard\Mitra\Pengaturan\KuotaMarketing;

use App\Models\Mitra;
use App\Models\Pembayaran;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormBayarSekarang;
use Illuminate\Support\Facades\Auth;

class BayarController extends Controller
{
    public function index()
    {
        $idMitra = Mitra::where('user_id', Auth::user()->id)->value('id');
        $data = [
            'breadcrumbs' => [
                ['name' => 'Pembayaran', 'url' => '/kuota-marketing/bayar'],
            ],
            'isActive' => 'kuota-marketing.bayar',
            'pembayarans' => Pembayaran::where('mitra_id', $idMitra)->latest()->get(),
        ];
        return view('web/dashboard/mitra/Pengaturan/kuota-marketing/bayar/index', $data);
    }

    public function edit(string $id)
    {
        $data = [
            'breadcrumbs' => [
                ['name' => 'Pembayaran', 'url' => '/kuota-marketing/bayar'],
                ['name' => 'Bayar Sekarang', 'url' => null],
            ],
            'isActive' => 'kuota-marketing.bayar',
            'pembayaran' => Pembayaran::find($id),
        ];
        return view('web/dashboard/mitra/Pengaturan/kuota-marketing/bayar/edit', $data);
    }

    public function update(FormBayarSekarang $request, string $id)
    {
        $validatedData = $request->validate();
        $isUpdated = Pembayaran::find($id)->update($validatedData);
        if ($isUpdated) {
            return redirect()->route('kuota-marketing.bayar')->with('success', 'Data pembayaran telah dikirim dan menunggu konfirmasi dari admin');
        }
        return redirect()->back()->withErrors($validatedData);
    }

    public function destroy(string $id)
    {
        $isDeleted = Pembayaran::find($id)->delete();
        if ($isDeleted) {
            return redirect()->back()->with('success', 'Data pembayaran telah dihapus');
        }
        return redirect()->back()->with('error', 'Terjadi kesalahan pada database atau server');
    }
}
