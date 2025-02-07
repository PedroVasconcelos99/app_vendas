<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;

Route::resource('cliente', ClienteController::class);

Route::view('/','index')->name('home');
// Route::view('/register','auth.register')->name('register');

// Route::post('/register', [AuthController::class, 'register']);