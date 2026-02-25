<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get("/", [AuthController::class,"showLogin"])->name("login");
Route::get("/login", [AuthController::class,"showLogin"])->name("login.page");
Route::post("/login", [AuthController::class,"login"])->name("login.submit");
Route::get("/register", [AuthController::class,"showRegister"])->name("register");
Route::post("/register", [AuthController::class,"register.Step"])->name("register.submit");
Route::get("register/step2", [AuthController::class,"showRegisterStep2"])->name("register.step2");
Route::post("/register/step2", [AuthController::class,"RegisterStep2.submit"] ) ->name("register.step2.submit");           


