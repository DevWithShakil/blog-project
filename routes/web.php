<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes...
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes...
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
Route::get('/dashboard', function () {
        return "<h1>Welcome to Admin Dashboard</h1> <p>Logged in as: " . Auth::user()->name . "</p>";
    })->name('admin.dashboard');
Route::resource('categories', CategoryController::class);
Route::resource('posts', PostController::class);
});
