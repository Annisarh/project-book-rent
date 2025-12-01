<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
                Auth::logout();
                // Hapus session
                $request->session()->invalidate();
                $request->session()->regenerateToken();

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

    public function store(Request $request)
    {
        $rule = [
            'username' => 'required|string|min:2|unique:users',
            'password' => 'required|min:6|max:255',
            'phone' => 'min:12',
            'address' => 'required|min:6',
            'ktp' => 'file|mimes:png,jpg,jpeg,avif'
        ];
        $validatedData = $request->validate($rule);
        $role = Role::where('name', 'client')->first();
        $validatedData['role_id'] = $role->id;
        $validatedData['password'] = Hash::make($request->password);
        if ($request->file('ktp')) {
            $ekstension = $request->file('ktp')->getClientOriginalExtension();
            $newName = $request->username . '.' . now()->timestamp . '.' . $ekstension;
            $request->file('ktp')->storeAs('ktp', $newName);
        }
        $validatedData['ktp'] = $newName;
        // dd($validatedData);
        User::create($validatedData);
        return redirect()->route('auth.register')->with('success', 'User berhasil ditambahkan, tunggu admin approve');
    }
}
