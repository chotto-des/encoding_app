<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AddressController;

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/',               [AuthController::class, 'showLogin'])->name('login');
    Route::get('/login',          [AuthController::class, 'showLogin'])->name('login.page');
    Route::post('/login',         [AuthController::class, 'login'])->name('login.submit');
    Route::get('/register',       [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register',      [AuthController::class, 'registerStep1'])->name('register.submit');
    Route::get('/register/step2', [AuthController::class, 'showRegisterStep2'])->name('register.step2');
    Route::post('/register/step2',[AuthController::class, 'register'])->name('register.step2.submit');
    Route::get('/verify-email',   [AuthController::class, 'showVerification'])->name('verification.show');
    Route::post('/verify-email',  [AuthController::class, 'verifyOtp'])->name('verification.submit');
    Route::post('/verify-email/resend', [AuthController::class, 'resendOtp'])->name('verification.resend');
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/home', [StudentController::class, 'index'])->name('home');
    Route::get('/add-student',  [StudentController::class, 'create'])->name('add-student');
    Route::post('/add-student', [StudentController::class, 'store'])->name('add-student.store');
    Route::post('/logout',      [AuthController::class, 'logout'])->name('logout');
    Route::delete('/students/{student}',      [StudentController::class, 'destroy'])->name('students.destroy');
    Route::get('/students/{student}/edit',   [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/students/{student}',        [StudentController::class, 'update'])->name('students.update');
});

// Local address API (served from DB)
Route::prefix('api/address')->group(function () {
    Route::get('/provinces',                         [AddressController::class, 'provinces'])->name('address.provinces');
    Route::get('/provinces/{code}/municipalities',   [AddressController::class, 'municipalities'])->name('address.municipalities');
    Route::get('/municipalities/{code}/barangays',   [AddressController::class, 'barangays'])->name('address.barangays');
});