<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RentLogsController;
use App\Http\Controllers\DashbaordController;

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashbaordController::class, 'index'])->name('admin.dashboard')->middleware('onlyAdmin');
    Route::get('/profile', [UserController::class, 'index'])->name('client.profile')->middleware('onlyClient');

    Route::get('/books', [BooksController::class, 'index'])->name('books');
    Route::get('/categories', [CategoryController::class, 'index'])->name('category');
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/rent-logs', [RentLogsController::class, 'index'])->name('rent-logs');
});

Route::middleware(['onlyGuest'])->group(function () {
    Route::get("/login", [AuthController::class, "login"])->name('login');
    Route::post("/login", [AuthController::class, "authenticating"])->name('auth.process');
    Route::get("/register", [AuthController::class, "register"])->name('auth.register');
    Route::post("/register", [AuthController::class, "store"])->name('auth.register.store');
});
