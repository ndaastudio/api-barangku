<?php

namespace App\Http\Controllers\Web\Dashboard\Mitra\Pengaturan\KuotaMarketing;

use App\Models\Mitra;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HargaController extends Controller
{
    public function index()
    {
        $data = [
            'breadcrumbs' => [
                ['name' => 'Harga Marketing', 'url' => '/kuota-marketing/harga'],
            ],
            'isActive' => 'kuota-marketing.harga',
            'mitra' => Mitra::where('user_id', Auth::user()->id)->first(),
        ];
        return view('web/dashboard/mitra/Pengaturan/kuota-marketing/harga/index', $data);
    }

    public function update(Request $request)
    {
        $isUpdated = Mitra::where('user_id', Auth::user()->id)->update([
            'harga_kode' => $request->harga_kode,
        ]);
        if ($isUpdated) {
            return redirect()->back()->with('success', 'Harga Kode Daftar telah diperbarui');
        }
        return redirect()->back()->with('error', 'Terjadi kesalahan pada database atau server');
    }
}
