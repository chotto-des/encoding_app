<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\EmployeeController;

//  Auth routes (guest only)
Route::middleware('guest')->controller(AuthController::class)->group(function () {

    // Login
    Route::get('/',         'showLogin')->name('login');
    Route::get('/login',    'showLogin')->name('login.page');
    Route::post('/login',   'login')->name('login.submit');

    // Register
    Route::get('/register',        'showRegister')->name('register');
    Route::post('/register',       'registerStep1')->name('register.submit');
    Route::get('/register/step2',  'showRegisterStep2')->name('register.step2');
    Route::post('/register/step2', 'register')->name('register.step2.submit');

    // Email verification
    Route::get('/verify-email',          'showVerification')->name('verification.show');
    Route::post('/verify-email',         'verifyOtp')->name('verification.submit');
    Route::post('/verify-email/resend',  'resendOtp')->name('verification.resend');
});

//  Authenticated routes
Route::middleware('auth')->group(function () {

    // Home dashboard
    Route::get('/home', fn() => view('home'))->name('home');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Employees
    Route::controller(EmployeeController::class)->prefix('employees')->name('employees.')->group(function () {
        Route::get('/',                'index')->name('index');
        Route::get('/create',          'create')->name('create');
        Route::post('/',               'store')->name('store');
        Route::get('/{employee}/edit', 'edit')->name('edit');
        Route::put('/{employee}',      'update')->name('update');
        Route::delete('/{employee}',   'destroy')->name('destroy');
    });

    // Students 
    Route::controller(StudentController::class)->prefix('students')->name('students.')->group(function () {
        Route::get('/',               'index')->name('index');
        Route::get('/create',         'create')->name('create');
        Route::post('/',              'store')->name('store');
        Route::get('/{student}/edit', 'edit')->name('edit');
        Route::put('/{student}',      'update')->name('update');
        Route::delete('/{student}',   'destroy')->name('destroy');
    });
});  


//  Address API
Route::prefix('address')->name('address.')->controller(AddressController::class)->group(function () {
    Route::get('/provinces',                        'provinces')->name('provinces');
    Route::get('/provinces/{code}/municipalities',  'municipalities')->name('municipalities');
    Route::get('/municipalities/{code}/barangays',  'barangays')->name('barangays');
});