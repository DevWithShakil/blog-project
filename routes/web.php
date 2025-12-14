<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes...
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes...
Route::get('/admin/dashboard', function () {
    return "Welcome to Admin Dashboard! (Logged in as: " . Auth::user()->name . ")";
})->middleware('auth');
