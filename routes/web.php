<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\LojasController;
use Illuminate\Support\Facades\Route;

Route::resource('clientes', ClientesController::class);
Route::resource('lojas', LojasController::class);

Route::view('/','index')->name('home');