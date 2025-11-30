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

// route untuk menampilkan halaman blog
Route::get('/blog', function () {
    return view('blog');
});

// route untuk menampilkan halaman contact
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');