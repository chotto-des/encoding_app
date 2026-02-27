<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/',               [AuthController::class, 'showLogin'])->name('login');
    Route::get('/login',          [AuthController::class, 'showLogin'])->name('login.page');
    Route::post('/login',         [AuthController::class, 'login'])->name('login.submit');
    Route::get('/register',       [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register',      [AuthController::class, 'registerStep1'])->name('register.submit');
    Route::get('/register/step2', [AuthController::class, 'showRegisterStep2'])->name('register.step2');
    Route::post('/register/step2',[AuthController::class, 'register'])->name('register.step2.submit');
});

// Authenticated routes
//Route::middleware('auth')->group(function () {
    Route::get('/home',         fn() => view('home'))->name('home');
    Route::get('/add-student',  [StudentController::class, 'create'])->name('add-student');
    Route::post('/add-student', [StudentController::class, 'store'])->name('add-student.store');
    Route::post('/logout',      [AuthController::class, 'logout'])->name('logout');
//});
