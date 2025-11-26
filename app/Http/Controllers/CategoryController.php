<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('Category', compact('categories'));
    }

    public function add()
    {
        return view('Category-add');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|min:2|max:100|unique:categories'
        ];
        $validateData = $request->validate($rules);
        Category::create($validateData);
        return redirect()->route('category')->with('success', 'data berhasil ditambahkan');
    }

    public function edit(string $slug)
    {
        $data = Category::where('slug', $slug)->first();
        return view('Category-edit', compact('data'));
    }

    public function update(Request $request, $slug)
    {
        $rules = [
            'name' => 'required|string|min:2|max:100|unique:categories'
        ];
        $validateData = $request->validate($rules);
        $category = Category::where('slug', $slug)->first();
        $category->slug = null;
        $category->update($validateData);
        return redirect()->route('category')->with('success', 'category updated Successfully');
    }

    public function delete(string $slug)
    {
        $category = Category::where('slug', $slug)->first();
        $category->delete();
        return redirect()->route('category')->with('success', 'category deleted Successfully');
    }

    public function deletedCategory()
    {
        $categoryDeleted = Category::onlyTrashed()->get();
        // dd($categoryDeleted);
        return view('Category-deleted-list', compact('categoryDeleted'));
    }

    public function restore(string $slug)
    {
        $category = Category::withTrashed()->where('slug', $slug)->first();
        $category->restore();
        return redirect()->route('category')->with('success', 'category restore Successfully');
    }
}
