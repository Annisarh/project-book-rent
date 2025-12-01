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
}
