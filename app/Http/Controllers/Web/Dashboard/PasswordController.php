<?php

namespace App\Http\Controllers\Web\Dashboard;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormEditPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class PasswordController extends Controller
{

    public function index()
    {
        $data = [
            'breadcrumbs' => [
                ['name' => 'Password', 'url' => '/password'],
            ],
            'isActive' => 'password'
        ];
        return view('web.dashboard.password.index', $data);
    }

    public function edit()
    {
        $data = [
            'breadcrumbs' => [
                ['name' => 'Password', 'url' => '/password'],
                ['name' => 'Edit', 'url' => null],
            ],
            'isActive' => 'password'
        ];
        return view('web.dashboard.password.edit', $data);
    }

    public function update(FormEditPassword $request)
    {
        $user = auth()->user();
        $isCorrectOldPassword = Hash::check($request->password_lama, $user->password);
        if (!$isCorrectOldPassword) {
            return redirect()->back()->with('error', 'Password lama salah');
        }
        User::find($user->id)->update([
            'password' => Hash::make($request->password_baru),
            'secret_key' => Crypt::encryptString($request->password_baru, env('APP_KEY'))
        ]);
        return redirect()->to('password')->with('success', 'Password berhasil diubah');
    }
}
