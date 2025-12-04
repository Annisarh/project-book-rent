<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use App\Models\RentLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;

class BookRentController extends Controller
{
    public function index()
    {

        $user = User::where('status', 'active')->whereHas('role', function ($q) {
            $q->where('name', '!=', 'admin');
        })->get();
        $books = Book::where('status', 'in stock')->get();
        return view('Book-rent', compact('user', 'books'));
    }

    public function store(Request $request)
    {
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(3)->toDateString();

        $book = Book::findOrFail($request->book_id)->only('status');
        if ($book['status'] != 'in stock') {
            Session::flash('message', "cannot rent, the book is not available");
            return redirect()->route('book.rent');
        } else {
            $count = RentLog::where('user_id', $request->user_id)->where('actual_return_date', null)->count();
            if ($count >= 3) {
                Session::flash('message', "cannot rent, user has reach the limit");
                return redirect()->route('book.rent');
            }
            try {
                DB::beginTransaction();
                // proses insert ke tabel rent-log
                RentLog::create($request->all());
                // proses update book rent
                $book = Book::findOrFail($request->book_id);
                $book->status = 'not available';
                $book->save();
                DB::commit();
                return redirect()->route('book.rent')->with('success', 'berhasil dipinjam');
            } catch (\Throwable $th) {
                DB::rollBack();
            }
        }
    }

    public function return()
    {
        $user = User::where('status', 'active')->whereHas('role', function ($q) {
            $q->where('name', '!=', 'admin');
        })->get();
        return view('Book-return', compact('user'));
    }

    public function getBook(string $id)
    {
        $book = RentLog::where('user_id', $id)->with('book')->get();
        return response()->json($book);
    }

    public function update(Request $request)
    {
        // $log = RentLog::where('user_id', $request->user_id)->where('book_id', $request->book_id)->first();
        // $tgl = Carbon::now()->toDateString();
        // $log->update([
        //     'actual_return_date' => $tgl
        // ]);
        // dd($request->all());
        $log = RentLog::where('user_id', $request->user_id)->where('book_id', $request->book_id)->whereNull('actual_return_date')->first();
        $log->update([
            "actual_return_date" => Carbon::now()->toDateString()
        ]);
        $book = Book::findOrFail($request->book_id);
        $book->status = 'in stock';
        $book->save();
        return redirect()->route('book.return')->with('success', 'berhasil mengembalikan buku');
    }
}
