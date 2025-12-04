<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\RentLog;
use App\Models\Category;
use Illuminate\Http\Request;

class DashbaordController extends Controller
{
    public function index()
    {
        $bookCount = Book::count();
        $categoriesCount = Category::count();
        $userCount = User::count();
        $rentLogs = RentLog::with(['user', 'book'])->limit(5)->get();
        return view('Dashboard', compact('bookCount', 'categoriesCount', 'userCount', 'rentLogs'));
    }
}
