<?php

namespace App\Http\Controllers\Web\Home;

use App\Models\Mitra;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormRekrutmen;

class RekrutmenController extends Controller
{
    public function index()
    {
        $data = [
            'isActive' => 'Rekrutmen',
            'title' => 'Rekrutmen',
        ];
        return view('web.home.rekrutmen.index', $data);
    }

    public function store(FormRekrutmen $request)
    {
        $validatedData = $request->validate();
        if (Mitra::create($validatedData)) {
            return redirect()->back()->with('success', 'Formulir rekrutmen berhasil dikirim. Tim Barangku akan segera menghubungi anda melalui kontak yang telah anda berikan untuk proses selanjutnya. Terima Kasih.');
        }
        return redirect()->back()->withErrors($validatedData);
    }
}
