<?php

namespace App\Http\Controllers\API\Auth;

use App\Models\Akun;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function getAkunByKodeDaftar(Request $request)
    {
        $validatedData = [
            [
                'kode_daftar' => 'required',
            ],
            [
                'kode_daftar.required' => 'Kode daftar tidak boleh kosong',
            ]
        ];
        $validator = Validator::make($request->all(), $validatedData[0], $validatedData[1]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ], 401);
        }
        $isValidKodeDaftar = Akun::where('kode_daftar', $request->kode_daftar);
        if (!$isValidKodeDaftar->exists()) {
            return response()->json([
                'status' => false,
                'message' => 'Kode daftar tidak valid',
            ], 401);
        }
        if ($isValidKodeDaftar->first()->status_akun == 1) {
            return response()->json([
                'status' => false,
                'message' => 'Kode daftar sudah digunakan, silahkan login',
            ], 401);
        }
        return response()->json([
            'status' => true,
            'message' => 'Berhasil validasi kode daftar',
            'data' => $isValidKodeDaftar->first()->only(['nomor_telepon']),
        ], 200);
    }

    public function registerAkun(Request $request)
    {
        $validatedData = [
            [
                'nama' => 'required',
                'email' => 'required|email',
                'nomor_telepon' => 'required',
                'password' => 'required|min:8|max:16',
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'email.required' => 'Email tidak boleh kosong',
                'email.email' => 'Email tidak valid',
                'nomor_telepon.required' => 'Nomor telepon tidak boleh kosong',
                'password.required' => 'Password tidak boleh kosong',
                'password.min' => 'Password minimal 8 karakter',
                'password.max' => 'Password maksimal 16 karakter',
            ]
        ];
        $validator = Validator::make($request->all(), $validatedData[0], $validatedData[1]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ], 401);
        }
        date_default_timezone_set('Asia/Jakarta');
        $isValidAkun = Akun::where('nomor_telepon', $request->nomor_telepon);
        if (!$isValidAkun->exists()) {
            return response()->json([
                'status' => false,
                'message' => 'Nomor telepon tidak ditemukan',
            ], 401);
        }
        if ($isValidAkun->first()->status_akun == 1) {
            return response()->json([
                'status' => false,
                'message' => 'Akun sudah teraktivasi, silahkan login',
            ], 401);
        }
        $isValidAkun->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Crypt::encryptString($request->password, env('APP_KEY')),
            'status_akun' => 1,
            'limit_akun' => date('Y-m-d H:i:s', strtotime('+7 day')),
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Akun telah didaftarkan, silahkan login',
        ], 200);
    }
}
