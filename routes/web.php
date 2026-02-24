<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/',          [AuthController::class, 'showLogin'])->name('login');
    Route::get('/login',     [AuthController::class, 'showLogin'])->name('login.page');
    Route::post('/login',    [AuthController::class, 'login'])->name('login.submit');
    Route::get('/register',  [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/home',     fn() => view('home'))->name('home');
    Route::post('/logout',  [AuthController::class, 'logout'])->name('logout');
});
