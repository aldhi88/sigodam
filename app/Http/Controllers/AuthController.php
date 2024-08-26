<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        $data['page'] = 'form-login';
        $data['title'] = config('app.name');
        return view('mods.auth.index', compact('data'));
    }

    public function register()
    {
        $data['page'] = 'register';
        $data['title'] = "Form Registrasi";
        return view('mods.auth.index', compact('data'));
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect()->route('auth.login');
    }

    public function accountSetting()
    {
        $data['page'] = 'account-setting';
        $data['title'] = 'Pengaturan Akun';
        return view('mods.auth.index_app', compact('data'));
    }
}
