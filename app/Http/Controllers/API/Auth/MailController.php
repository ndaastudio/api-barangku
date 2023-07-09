<?php

namespace App\Http\Controllers\API\Auth;

use App\Models\Akun;
use App\Mail\LupaPassword;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller
{
    public function sendKodeLupaPw(Request $request)
    {
        $validatedData = [
            [
                'email' => 'required|email',
            ],
            [
                'email.required' => 'Email tidak boleh kosong',
                'email.email' => 'Email tidak valid',
            ]
        ];
        $validator = Validator::make($request->all(), $validatedData[0], $validatedData[1]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ], 401);
        }
        $isValidAkun = Akun::where('email', $request->email);
        if (!$isValidAkun->exists()) {
            return response()->json([
                'status' => false,
                'message' => 'Email tidak terdaftar'
            ], 401);
        }
        $isGenerateToken = false;
        while (!$isGenerateToken) {
            $resetToken = random_int(100000, 999999);
            $isGenerateToken = !Akun::where('kode_lupa_password', $resetToken)->exists();
        }
        $isValidAkun->update([
            'kode_lupa_password' => $resetToken
        ]);
        $data = [
            'namaPenerima' => $isValidAkun->first()->nama,
            'kodeVerifikasi' => $resetToken
        ];
        Mail::to($isValidAkun->first()->email)->send(new LupaPassword($data));
        return response()->json([
            'status' => true,
            'message' => 'Kode verifikasi telah dikirim, silahkan cek email Anda'
        ], 200);
    }

    public function verifKodeLupaPw(Request $request)
    {
        $validatedData = [
            [
                'kode_lupa_password' => 'required|numeric|digits:6',
                'password_baru' => 'required|min:8|max:16',
            ],
            [
                'kode_lupa_password.required' => 'Kode verifikasi tidak boleh kosong',
                'kode_lupa_password.numeric' => 'Kode verifikasi harus berupa angka',
                'kode_lupa_password.digits' => 'Kode verifikasi maksimal 6 digit',
                'password_baru.required' => 'Password baru tidak boleh kosong',
                'password_baru.min' => 'Password baru minimal 8 karakter',
                'password_baru.max' => 'Password baru maksimal 16 karakter',
            ]
        ];
        $validator = Validator::make($request->all(), $validatedData[0], $validatedData[1]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ], 401);
        }
        $isValidAkun = Akun::where('kode_lupa_password', $request->kode_lupa_password);
        if (!$isValidAkun->exists()) {
            return response()->json([
                'status' => false,
                'message' => 'Kode verifikasi tidak valid'
            ], 401);
        }
        $isValidAkun->update([
            'password' => Crypt::encryptString($request->password_baru, env('APP_KEY')),
            'kode_lupa_password' => null
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Password telah diubah, silahkan login dengan password baru Anda'
        ], 200);
    }
}
