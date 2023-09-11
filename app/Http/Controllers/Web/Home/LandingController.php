<?php

namespace App\Http\Controllers\Web\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $data = [
            'isActive' => 'Landing',
            'title' => 'Barangku',
        ];
        return view('web.home.landing.index', $data);
    }
}
