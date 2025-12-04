<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookRent;
use App\Http\Controllers\BookRentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RentLogsController;
use App\Http\Controllers\DashbaordController;
use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {

    Route::get('/profile', [UserController::class, 'profile'])->name('profile')->name('profile');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashbaordController::class, 'index'])->name('admin.dashboard')->middleware('onlyAdmin');

    Route::get('/books', [BooksController::class, 'index'])->name('books')->middleware('onlyAdmin');
    Route::get('/books-add', [BooksController::class, 'add'])->name('books.add')->middleware('onlyAdmin');
    Route::post('/books-add', [BooksController::class, 'store'])->name('books.store')->middleware('onlyAdmin');
    Route::get('/books-edit/{slug}', [BooksController::class, 'edit'])->name('books.edit')->middleware('onlyAdmin');
    Route::put('/books-edit/{slug}', [BooksController::class, 'update'])->name('books.update')->middleware('onlyAdmin');
    Route::get('/books-delete/{slug}', [BooksController::class, 'delete'])->name('books.delete')->middleware('onlyAdmin');
    Route::get('/books-deleted', [BooksController::class, 'deletedBooks'])->name('books.deleted')->middleware('onlyAdmin');
    Route::get('/books-restore/{slug}', [BooksController::class, 'restore'])->name('books.restore')->middleware('onlyAdmin');


    Route::get('/users', [UserController::class, 'index'])->name('users')->middleware('onlyAdmin');
    Route::get('/users/detail/{id}', [UserController::class, 'detail'])->name('users.detail')->middleware('onlyAdmin');
    Route::put('/users/detail/{id}', [UserController::class, 'update'])->name('users.update')->middleware('onlyAdmin');
    Route::delete('/users/{id}', [UserController::class, 'delete'])->name('users.delete')->middleware('onlyAdmin');


    Route::get('/rent-logs', [RentLogsController::class, 'index'])->name('rent-logs')->name('rentLogs');

    Route::get('/book-rent', [BookRentController::class, 'index'])->name('book.rent')->middleware('onlyAdmin');
    Route::post('/book-rent', [BookRentController::class, 'store'])->name('book.store')->middleware('onlyAdmin');
    Route::get('/book-return', [BookRentController::class, 'return'])->name('book.return')->middleware('onlyAdmin');
    Route::get('/book-return/{id}', [BookRentController::class, 'getBook'])->name('book.getBook')->middleware('onlyAdmin');
    Route::post('/book-return', [BookRentController::class, 'update'])->name('book.updateRent')->middleware('onlyAdmin');

    Route::get('/category', [CategoryController::class, 'index'])->name('category')->middleware('onlyAdmin');
    Route::get('/category-add', [CategoryController::class, 'add'])->name('category.add')->middleware('onlyAdmin');
    Route::post('/category-add', [CategoryController::class, 'store'])->name('category.store')->middleware('onlyAdmin');
    Route::get('/category-edit/{slug}', [CategoryController::class, 'edit'])->name('category.edit')->middleware('onlyAdmin');
    Route::put('/category-edit/{slug}', [CategoryController::class, 'update'])->name('category.update')->middleware('onlyAdmin');
    Route::put('/category-edit/{slug}', [CategoryController::class, 'update'])->name('category.update')->middleware('onlyAdmin');
    Route::get('/category-delete/{slug}', [CategoryController::class, 'delete'])->name('category.delete')->middleware('onlyAdmin');
    Route::get('/category-deleted', [CategoryController::class, 'deletedCategory'])->name('category.deleted')->middleware('onlyAdmin');
    Route::get('/category-restore/{slug}', [CategoryController::class, 'restore'])->name('category.restore')->middleware('onlyAdmin');
});

Route::middleware(['onlyGuest'])->group(function () {
    Route::get("/login", [AuthController::class, "login"])->name('login');
    Route::post("/login", [AuthController::class, "authenticating"])->name('auth.process');
    Route::get("/register", [AuthController::class, "register"])->name('auth.register');
    Route::post("/register", [AuthController::class, "store"])->name('auth.register.store');
});
