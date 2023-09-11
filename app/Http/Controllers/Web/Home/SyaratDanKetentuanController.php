<?php

namespace App\Http\Controllers\Web\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SyaratDanKetentuanController extends Controller
{
    public function index()
    {
        $data = [
            'isActive' => 'SyaratDanKetentuan',
            'title' => 'Syarat dan Ketentuan',
        ];
        return view('web.home.syarat-dan-ketentuan.index', $data);
    }
}
