<?php

namespace App\Http\Controllers\Web\Dashboard\Mitra\Pengaturan;

use App\Models\Mitra;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\FormHargaJual;

class HargaJualController extends Controller
{
    public function index()
    {
        $data = [
            'breadcrumbs' => [
                ['name' => 'Harga Jual', 'url' => '/harga-jual'],
            ],
            'isActive' => 'harga-jual',
            'mitra' => Mitra::where('user_id', Auth::user()->id)->first(),
        ];
        return view('web.dashboard.mitra.Pengaturan.harga-jual.index', $data);
    }

    public function edit()
    {
        $data = [
            'breadcrumbs' => [
                ['name' => 'Harga Jual', 'url' => '/harga-jual'],
                ['name' => 'Edit', 'url' => null],
            ],
            'isActive' => 'harga-jual',
            'mitra' => Mitra::where('user_id', Auth::user()->id)->first(),
        ];
        return view('web.dashboard.mitra.Pengaturan.harga-jual.edit', $data);
    }

    public function update(FormHargaJual $request)
    {
        $nominal = str_replace('.', '', $request->harga_kode);
        $nominal = str_replace(',', '', $nominal);
        $isUpdated = Mitra::where('user_id', Auth::user()->id)->update([
            'nama_rekening' => $request->nama_rekening,
            'nama_bank' => $request->nama_bank,
            'nomor_rekening' => $request->nomor_rekening,
            'harga_kode' => $nominal,
        ]);
        if ($isUpdated) {
            return redirect()->to('harga-jual')->with('success', 'Harga Jual Anda telah diatur');
        }
        return redirect()->back()->with('error', 'Terjadi kesalahan pada database atau server');
    }
}
