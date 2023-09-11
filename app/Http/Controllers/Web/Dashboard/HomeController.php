<?php

namespace App\Http\Controllers\Web\Dashboard;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'breadcrumbs' => [
                ['name' => 'Dashboard', 'url' => '/dashboard'],
            ],
            'isActive' => 'dashboard'
        ];
        return view('web.dashboard.home.index', $data);
    }
}
