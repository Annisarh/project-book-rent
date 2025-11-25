<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class DashbaordController extends Controller
{
    public function index()
    {
        $bookCount = Book::count();
        $categoriesCount = Category::count();
        $userCount = User::count();
        return view('Dashboard', compact('bookCount', 'categoriesCount', 'userCount'));
    }
}
