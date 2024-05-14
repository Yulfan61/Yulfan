<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Ambil kredensial dari request
        $credentials = $request->only('email', 'password');

        // Coba otentikasi pengguna
        if (Auth::attempt($credentials)) {
            // Otentikasi berhasil, redirect ke halaman yang dimaksud
            $request->session()->regenerate();
            return redirect()->intended('medical-examination-queues');
        }

        // Otentikasi gagal, redirect kembali dengan error
        return back()->withErrors([
            'email' => 'These credentials do not match our records.',
        ])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
