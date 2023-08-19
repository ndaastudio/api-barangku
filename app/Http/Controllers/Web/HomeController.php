<?php

namespace App\Http\Controllers\Web;

use App\Models\Akun;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function syaratDanKetentuan()
    {
        return view('syarat-dan-ketentuan');
    }

    public function registerTester()
    {
        return view('register-tester');
    }

    public function submitRegisterTester(Request $request)
    {
        $validatedData = $request->validate(
            [
                'nomor_telepon' => 'required|numeric|unique:akun,nomor_telepon|digits_between:10,13',
            ],
            [
                'nomor_telepon.required' => 'Nomor WhatsApp tidak boleh kosong',
                'nomor_telepon.numeric' => 'Nomor WhatsApp harus berupa angka',
                'nomor_telepon.unique' => 'Nomor WhatsApp sudah terdaftar sebelumnya',
                'nomor_telepon.digits_between' => 'Nomor WhatsApp harus berisi 10-13 digit',
            ]
        );
        $isGenerate = false;
        while (!$isGenerate) {
            $kodeDaftar = Str::lower(Str::random(6));
            if (Akun::where('kode_daftar', $kodeDaftar)->count() == 0) {
                $resultKodeDaftar = $kodeDaftar;
                $isGenerate = true;
            }
        }
        $validatedData['kode_daftar'] = $resultKodeDaftar;
        $validatedData['jenis_akun'] = 0;
        $isCreatedAkun = Akun::create($validatedData);
        if ($isCreatedAkun) {
            $kodeDaftar = $isCreatedAkun->kode_daftar;
            session()->put('kode_daftar', $kodeDaftar);
            return redirect('/register-tester')->with('success', $kodeDaftar);
        }
        return redirect()->back()->withErrors($validatedData);
    }
}
