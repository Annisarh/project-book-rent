<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('Login');
    }
    public function register(Request $request)
    {
        return view('Register');
    }

    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            // cek apakah sudah status sudah diactivasi admin
            if (Auth::user()->status != 'active') {
                return back()->with('error', 'activasi belum di approve admin');
            }
            // dd(Auth::user()->role->name);
            // generate dulu session usernya
            $request->session()->regenerate();
            if (Auth::user()->role->name == 'admin') {
                return redirect()->intended('dashboard');
            }
            if (Auth::user()->role->name == 'client') {
                return redirect()->intended('profile');
            }
        }

        return back()->with('error', 'The provided credentials do not match our records.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // Hapus session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
