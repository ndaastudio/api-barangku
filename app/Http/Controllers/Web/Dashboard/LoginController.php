<?php

namespace App\Http\Controllers\Web\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormLoginDashboard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard | Login',
        ];
        return view('web.dashboard.login', $data);
    }

    public function authtenticate(FormLoginDashboard $request)
    {
        $isAuthenticated = Auth::attempt($request->only('nomor_whatsapp', 'password'));
        if ($isAuthenticated) {
            return redirect()->route('dashboard');
        }
        return redirect()->back()->with('error', 'Nomor WhatsApp atau password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('dashboard.login')->with('success', 'Anda telah logout');
    }
}
