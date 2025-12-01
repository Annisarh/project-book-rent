<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('Books', compact('books'));
    }

    public function add()
    {
        $categories = Category::all();
        return view('Book-add', compact('categories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'book_code' => 'required|min:2|unique:books',
            'title' => 'required|min:2',
            'cover' => 'file|mimes:png,jpg,jpeg,avif'
        ];
        $validateData = $request->validate($rules);
        // upload gambar
        $newName = '';
        if ($request->file('cover')) {
            $ektension = $request->file('cover')->getClientOriginalExtension();
            $newName = $request->title . '.' . now()->timestamp . '.' . $ektension;
            $request->file('cover')->storeAs('cover', $newName);
        }
        // dd($newName);
        $validateData['cover'] = $newName;
        $book = Book::create($validateData);
        $book->categories()->sync($request->categories);
        return redirect()->route('books')->with('success', 'data buku berhasil ditambahkan!');
    }

    public function edit(string $slug)
    {
        $book = Book::where('slug', $slug)->first();
        $categories = Category::all();
        return view('Books-edit', compact('categories', 'book'));
    }

    public function update(Request $request, string $slug)
    {
        $book = Book::where('slug', $slug)->first();
        $rules = [
            'book_code' => 'required|min:2|unique:books,book_code,' . $book->id,
            'title' => 'required|min:2',
            'cover' => 'file|mimes:png,jpg,jpeg,avif'
        ];
        $validateData = $request->validate($rules);
        // upload gambar
        if ($request->file('cover')) {
            if ($request->cover_old) {
                Storage::delete('cover/' . $request->cover_old);
            }
            $ektension = $request->file('cover')->getClientOriginalExtension();
            $newName = $request->title . '.' . now()->timestamp . '.' . $ektension;
            $request->file('cover')->storeAs('cover', $newName);
        } else {
            $newName = $request->cover_old;
        }
        // dd($newName);
        $validateData['cover'] = $newName;
        // dd($validateData);
        $book->update($validateData);
        // lakukan sync kalau user pilih categoriesnya
        if ($request->categories) {
            $book->categories()->sync($request->categories);
        }
        return redirect()->route('books')->with('success', 'data buku berhasil diupdate!');
    }

    public function delete(string $slug)
    {
        $book = Book::where('slug', $slug);
        $book->delete();
        return redirect()->route('books')->with('success', 'data berhasil di delete');
    }

    public function deletedBooks()
    {
        $booksDeleted = Book::onlyTrashed()->get();
        return view('Books-deleted-list', compact('booksDeleted'));
    }

    public function restore(string $slug)
    {
        $book = Book::withTrashed()->where('slug', $slug)->first();
        $book->restore();
        return redirect()->route('books')->with('success', 'books restore Successfully');
    }
}
