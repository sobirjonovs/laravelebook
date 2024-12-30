<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login-v2', [UserController::class, 'loginForm'])->name('loginv2.form');
Route::post('/login-v2', [UserController::class, 'login'])->name('loginv2');

Route::middleware('auth')->get('/admin', [UserController::class, 'admin']);
Route::middleware('auth')->get('/logout', [UserController::class, 'logout']);

Route::get('/books', [UserController::class, 'books']);
