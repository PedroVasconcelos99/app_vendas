<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\LojasController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\VendasController;
use App\Http\Controllers\VendedoresController;
use Illuminate\Support\Facades\Route;

Route::resource('clientes', ClientesController::class);
Route::resource('lojas', LojasController::class);
Route::resource('vendedores', VendedoresController::class)->parameters([
    'vendedores' => 'vendedor']);
Route::resource('produtos', ProdutosController::class);
Route::resource('vendas', VendasController::class);
Route::view('/','index')->name('home');