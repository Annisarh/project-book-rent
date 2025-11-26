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
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/rent-logs', [RentLogsController::class, 'index'])->name('rent-logs');

    Route::get('/categories', [CategoryController::class, 'index'])->name('category');
    Route::get('/category-add', [CategoryController::class, 'add'])->name('category.add');
    Route::post('/category-add', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category-edit/{slug}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category-edit/{slug}', [CategoryController::class, 'update'])->name('category.update');
    Route::put('/category-edit/{slug}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category-delete/{slug}', [CategoryController::class, 'delete'])->name('category.delete');
    Route::get('/category-deleted', [CategoryController::class, 'deletedCategory'])->name('category.deleted');
    Route::get('/category-restore/{slug}', [CategoryController::class, 'restore'])->name('category.restore');
});

Route::middleware(['onlyGuest'])->group(function () {
    Route::get("/login", [AuthController::class, "login"])->name('login');
    Route::post("/login", [AuthController::class, "authenticating"])->name('auth.process');
    Route::get("/register", [AuthController::class, "register"])->name('auth.register');
    Route::post("/register", [AuthController::class, "store"])->name('auth.register.store');
});
