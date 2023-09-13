<?php

namespace App\Http\Controllers\Web\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Akun;
use App\Models\ReqNonaktifAkun;

class ReqNonaktifkanAkunController extends Controller
{
    public function index()
    {
        $data = [
            'breadcrumbs' => [
                ['name' => 'Request Nonaktif Akun', 'url' => '/request-nonaktif-akun'],
            ],
            'isActive' => 'member.request.nonaktifkan',
            'members' => ReqNonaktifAkun::latest()->get(),
        ];
        return view('web/dashboard/admin/request-nonaktifkan-akun/index', $data);
    }

    public function update(string $id)
    {
        $isUpdated = Akun::find($id)->update(['status_akun' => 2]);
        if ($isUpdated) {
            return redirect()->back()->with('success', 'Akun telah dinonaktifkan');
        }
        return redirect()->back()->with('error', 'Terjadi kesalahan pada database atau server');
    }
}
