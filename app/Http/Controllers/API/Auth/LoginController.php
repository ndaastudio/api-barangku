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
                'nomor_telepon' => 'required|numeric|digits_between:10,13',
                'password' => 'required|min:8|max:16',
                'device_login' => 'required',
            ],
            [
                'nomor_telepon.required' => 'Nomor telepon tidak boleh kosong',
                'nomor_telepon.numeric' => 'Nomor telepon harus berupa angka',
                'nomor_telepon.digits_between' => 'Nomor telepon minimal 10 digit dan maksimal 13 digit',
                'password.required' => 'Password tidak boleh kosong',
                'password.min' => 'Password minimal 8 karakter',
                'password.max' => 'Password maksimal 16 karakter',
                'device_login.required' => 'Device login tidak boleh kosong',
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
        date_default_timezone_set('Asia/Jakarta');
        $currentDate = date('Y-m-d H:i:s');
        $expiredDate = date('Y-m-d H:i:s', strtotime($isValidAkun->first()->limit_akun));
        if ($currentDate > $expiredDate && $isValidAkun->first()->status_akun == 1) {
            $isValidAkun->first()->update([
                'status_akun' => 2,
            ]);
        }
        if ($isValidAkun->first()->status_akun == 2) {
            return response()->json([
                'status' => false,
                'message' => 'Akun telah expired, silahkan hubungi admin',
            ], 401);
        }
        $password = Crypt::decryptString($isValidAkun->first()->password);
        if ($request->password !== $password) {
            return response()->json([
                'status' => false,
                'message' => 'Password salah',
            ], 401);
        }
        // $token = $isValidAkun->first()->createToken('auth_token')->plainTextToken;
        // $isValidAkun->first()->update([
        //     'device_login' => $request->device_login,
        // ]);
        $token = $isValidAkun->first()->tokens()->where('name', $isValidAkun->first()->email)->first();

        if (!$token) {
            $token = $isValidAkun->first()->createToken($isValidAkun->first()->email)->plainTextToken;
        } else if ($token && $request->konfirmasi_login == 1) {
            $isValidAkun->first()->tokens()->where('name', $isValidAkun->first()->email)->delete();
            $token = $isValidAkun->first()->createToken($isValidAkun->first()->email)->plainTextToken;
        } else {
            return response()->json([
                'status' => false,
                'message' => [
                    'confirm' => 'Akun anda sedang digunakan pada perangkat lain. Apakah anda yakin ingin login di perangkat ini?',
                ]
            ]);
        }

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
                'nomor_telepon' => 'required|numeric|digits_between:10,13',
                'password_lama' => 'required',
                'password_baru' => 'required|min:8|max:16',
                'konfirmasi_password_baru' => 'required|same:password_baru',
            ],
            [
                'nomor_telepon.required' => 'Nomor telepon tidak boleh kosong',
                'nomor_telepon.numeric' => 'Nomor telepon harus berupa angka',
                'nomor_telepon.digits_between' => 'Nomor telepon minimal 10 digit dan maksimal 13 digit',
                'password_lama.required' => 'Password lama tidak boleh kosong',
                'password_baru.required' => 'Password baru tidak boleh kosong',
                'password_baru.min' => 'Password baru minimal 8 karakter',
                'password_baru.max' => 'Password baru maksimal 16 karakter',
                'konfirmasi_password_baru.required' => 'Konfirmasi password baru tidak boleh kosong',
                'konfirmasi_password_baru.same' => 'Konfirmasi password baru harus sama dengan password baru',
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
        if ($request->password_lama !== Crypt::decryptString($isValidAkun->first()->password, env('APP_KEY'))) {
            return response()->json([
                'status' => false,
                'message' => 'Password lama salah',
            ], 401);
        }
        $isValidAkun->update([
            'password' => Crypt::encryptString($request->password_baru, env('APP_KEY')),
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Password telah diubah',
            'data' => $isValidAkun->first(),
        ], 200);
    }

    public function checkExpiredAkun(string $id)
    {
        $isValidAkun = Akun::where('id', $id);
        date_default_timezone_set('Asia/Jakarta');
        $currentDate = date('Y-m-d H:i:s');
        $expiredDate = date('Y-m-d H:i:s', strtotime($isValidAkun->first()->limit_akun));
        if ($currentDate > $expiredDate) {
            $isValidAkun->first()->update([
                'status_akun' => 2,
            ]);
        }
        return response()->json([
            'status' => true,
            'status_akun' => $isValidAkun->first()->status_akun,
        ], 201);
    }
}
