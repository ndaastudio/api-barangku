<?php

namespace App\Http\Controllers\Web\Dashboard\Admin;

use App\Models\Akun;
use App\Models\ReqHapusAkun;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\GambarBarang;

class ReqHapusAkunController extends Controller
{
    public function index()
    {
        $data = [
            'breadcrumbs' => [
                ['name' => 'Request Hapus Akun', 'url' => '/request-hapus-akun'],
            ],
            'isActive' => 'member.request.hapus',
            'members' => ReqHapusAkun::latest()->get(),
        ];
        return view('web/dashboard/admin/request-hapus-akun/index', $data);
    }

    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            Barang::where('akun_id', $id)->delete();
            GambarBarang::where('akun_id', $id)->delete();
            ReqHapusAkun::where('akun_id', $id)->delete();
            Akun::find($id)->delete();
            DB::commit();
            return redirect()->back()->with('success', 'Akun telah dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan pada database atau server: ' . $e->getMessage());
        }
    }
}
