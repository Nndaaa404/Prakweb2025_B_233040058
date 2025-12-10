<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

// 1. Halaman Utama (Home)
Route::get('/', [PostController::class, 'index'])->name('home');

// --- TAMBAHAN ROUTE ABOUT DI SINI ---
Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Nama Admin", // Ganti dengan data statis kamu
        "email" => "admin@example.com",
        "image" => "foto-profile.png" // Pastikan ada file ini di public/img atau sesuaikan
    ]);
})->name('about');
// ------------------------------------

// 2. Route Posts (Blog)
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// 3. Route Detail Post (Single Post)
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');

// Route Categories
Route::get('/categories', [CategoryController::class, 'index']);

// Guest Routes (Login & Register)
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// 4. DASHBOARD (Auth & Verified)
Route::middleware(['auth'])->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardPostController::class, 'index'])->name('index');
    Route::get('/create', [DashboardPostController::class, 'create'])->name('create');
    Route::post('/', [DashboardPostController::class, 'store'])->name('store');
    Route::get('/{post:slug}', [DashboardPostController::class, 'show'])->name('show');
    Route::get('/{post:slug}/edit', [DashboardPostController::class, 'edit'])->name('edit');
    Route::put('/{post:slug}', [DashboardPostController::class, 'update'])->name('update');
    Route::delete('/{post:slug}', [DashboardPostController::class, 'destroy'])->name('destroy');

    Route::resource('/categories', \App\Http\Controllers\AdminCategoryController::class)->except('show');
});