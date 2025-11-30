<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

// contoh route untuk menampilkan halaman home
Route::get('/', function () {
    return view('home');
});

// contoh route untuk menampilkan halaman about
Route::get('/about', function () {
    return view('about');
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/categories', [CategoryController::class, 'index']);