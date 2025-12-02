<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        if ($request->category || $request->title) {
            // jika hanya dengan mencari title
            // $books = Book::where('title', 'like', '%' . $request->title . '%')->get();

            // kalau pakai categori aja
            // $books = Book::whereHas('categories', function ($q) use ($request) {
            //     $q->where('categories.id', $request->category);
            // })->get();

            // pencarian title dan category
            $books = Book::where('title', 'like', '%' . $request->title . '%')->whereHas('categories', function ($q) use ($request) {
                $q->where('categories.id', $request->category);
            })->get();
        } else {
            $books = Book::all();
        }
        return view('Home', compact('books', 'categories'));
    }
}
