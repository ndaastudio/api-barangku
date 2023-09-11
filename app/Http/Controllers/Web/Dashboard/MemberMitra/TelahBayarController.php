<?php

namespace App\Http\Controllers\Web\Dashboard\MemberMitra;

use App\Models\Akun;
use App\Models\Mitra;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TelahBayarController extends Controller
{
    public function index()
    {
        $idMitra = Mitra::where('user_id', Auth::user()->id)->value('id');
        $queryAdmin = Akun::where('status_akun', 0)->where('status_bayar', 1)->latest()->get();
        $queryMitra = Akun::where('status_akun', 0)->where('status_bayar', 1)->where('mitra_id', $idMitra)->latest()->get();
        $data = [
            'breadcrumbs' => [
                ['name' => 'Telah Bayar', 'url' => '/member/telah-bayar'],
            ],
            'isActive' => 'member.telah-bayar',
            'members' => Auth::user()->role === 'Admin' ? $queryAdmin : $queryMitra,
        ];
        return view('web.dashboard.MemberMitra.telah-bayar.index', $data);
    }

    public function update(string $id)
    {
        $isUpdated = Akun::find($id)->update(['status_bayar' => 0]);
        if ($isUpdated) {
            return redirect()->back()->with('success', 'Kode daftar dibatalkan dari status telah bayar');
        }
        return redirect()->back()->with('error', 'Terjadi kesalahan pada database atau server');
    }
}
