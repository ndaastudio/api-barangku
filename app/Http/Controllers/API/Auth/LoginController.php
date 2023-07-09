<?php

namespace App\Http\Controllers\API\Auth;

use App\Models\Akun;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => false,
            'message' => 'Akses tidak diizinkan',
        ], 403);
    }

    public function loginAkun(Request $request)
    {
        $validatedData = [
            [
                'nomor_telepon' => 'required',
                'password' => 'required|min:8|max:16',
            ],
            [
                'nomor_telepon.required' => 'Nomor telepon tidak boleh kosong',
                'password.required' => 'Password tidak boleh kosong',
                'password.min' => 'Password minimal 8 karakter',
            ]
        ];
        $validator = Validator::make($request->all(), $validatedData[0], $validatedData[1]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ], 401);
        }
        $isValidAkun = Akun::where('nomor_telepon', $request->nomor_telepon);
        if (!$isValidAkun->exists()) {
            return response()->json([
                'status' => false,
                'message' => 'Nomor telepon tidak terdaftar',
            ], 401);
        }
        if ($isValidAkun->first()->status_akun == 0) {
            return response()->json([
                'status' => false,
                'message' => 'Akun belum diaktivasi',
            ], 401);
        }
        $password = Crypt::decryptString($isValidAkun->first()->password);
        if ($request->password !== $password) {
            return response()->json([
                'status' => false,
                'message' => 'Password salah',
            ], 401);
        }
        $token = $isValidAkun->first()->createToken('auth_token')->plainTextToken;
        return response()->json([
            'status' => true,
            'message' => 'Berhasil login akun',
            'data' => $isValidAkun->first(),
            'access_token' => $token
        ], 200);
    }

    public function logoutAkun(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'status' => true,
            'message' => 'Berhasil keluar',
        ], 200);
    }

    public function directGantiPw(Request $request)
    {
        $validatedData = [
            [
                'nomor_telepon' => 'required|numeric',
                'password' => 'required|min:8|max:16',
            ],
            [
                'nomor_telepon.required' => 'Nomor telepon tidak boleh kosong',
                'nomor_telepon.numeric' => 'Nomor telepon harus berupa angka',
                'password.required' => 'Password tidak boleh kosong',
                'password.min' => 'Password minimal 8 karakter',
                'password.max' => 'Password maksimal 16 karakter',
            ]
        ];
        $validator = Validator::make($request->all(), $validatedData[0], $validatedData[1]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ], 401);
        }
        $isValidAkun = Akun::where('nomor_telepon', $request->nomor_telepon);
        if (!$isValidAkun->exists()) {
            return response()->json([
                'status' => false,
                'message' => 'Akun tidak terdaftar',
            ], 401);
        }
        if ($isValidAkun->first()->status_akun == 0) {
            return response()->json([
                'status' => false,
                'message' => 'Akun belum diaktivasi',
            ], 401);
        }
        $isValidAkun->update([
            'password' => Crypt::encryptString($request->password, env('APP_KEY')),
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Password telah diubah',
            'data' => $isValidAkun->first(),
        ], 200);
    }
}
