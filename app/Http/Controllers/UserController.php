<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RentLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $rentLogs = RentLog::with(['user', 'book'])->where('user_id', $user->id)->get();
        return view('User-detail', compact('user', 'rentLogs'));
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
        $user = Auth::user();
        $rentLogs = RentLog::with(['user', 'book'])->where('user_id', $user->id)->get();
        return view('Profile', compact('rentLogs'));
    }
}
