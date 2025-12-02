<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $userActive = User::where('status', 'active')->whereHas('role', function ($q) {
            $q->where('name', '!=', 'admin');
        })->get();
        $userInactive = User::where('status', 'inactive')->whereHas('role', function ($q) {
            $q->where('name', '!=', 'admin');
        })->get();;
        return view('Users', compact('userActive', 'userInactive'));
    }

    public function detail(string $id)
    {
        $user = User::where('id', $id)->first();
        return view('User-detail', compact('user'));
    }

    public function update(string $id)
    {
        $user = User::where('id', $id)->first();
        $user->update([
            'status' => 'active'
        ]);
        $user->refresh();
        return redirect()->route('users')->with('success', 'user ' . $user->username . ' sudah diapprove');
    }

    public function delete(string $id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('users')->with('success', 'user sudah didelete');
    }

    public function profile()
    {
        dd('ini adalah halaman profile');
    }
}
