<?php

namespace App\Http\Controllers\Web;

use App\Models\Akun;
use App\Models\ReqNonaktifAkun;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\FormNonaktifkanAkun;

class NonaktifkanAkunController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Nonaktifkan Akun',
        ];
        return view('web.nonaktifkan-akun', $data);
    }

    public function store(FormNonaktifkanAkun $request)
    {
        try {
            DB::beginTransaction();
            $akun = Akun::where('nomor_telepon', $request->nomor_telepon)->first();
            if ($akun) {
                if ($akun->status_akun === 0) {
                    return redirect()->back()->with('error', 'Akun belum diaktivasi');
                }
                if ($akun->status_akun === 2) {
                    return redirect()->back()->with('error', 'Akun sudah dinonaktifkan');
                }
                $password = Crypt::decryptString($akun->password, env('APP_KEY'));
                if ($request->password !== $password) {
                    return redirect()->back()->with('error', 'Password salah');
                }
                ReqNonaktifAkun::create(['akun_id' => $akun->id]);
                DB::commit();
                return redirect()->back()->with('success', 'Akun telah diajukan untuk dinonaktifkan. Mohon menunggu konfirmasi dari admin');
            }
            return redirect()->back()->with('error', 'Akun tidak terdaftar');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan pada server atau database: ' . $th->getMessage());
        }
    }
}
