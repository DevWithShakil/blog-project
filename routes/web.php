<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PublicController;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes...
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes...
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
Route::get('/dashboard', function () {
    $totalCategories = Category::count();
    $totalPosts = Post::count();
    return view('admin.dashboard', compact('totalCategories', 'totalPosts'));
})->name('admin.dashboard');
Route::resource('categories', CategoryController::class);
Route::resource('posts', PostController::class);
});


// Public Routes
Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/blog/{slug}', [PublicController::class, 'show'])->name('post.show');
Route::get('/category/{slug}', [PublicController::class, 'category'])->name('category.show');
