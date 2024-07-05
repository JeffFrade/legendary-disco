<?php

use App\Http\AuthController;
use App\Http\CategoriaController;
use App\Http\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');
Route::post('refresh', [AuthController::class, 'refresh'])->middleware('auth:api');
Route::post('me', [AuthController::class, 'me'])->middleware('auth:api');

Route::group(['prefix' => 'categorias', 'middleware' => 'auth:api'], function () {
    Route::post('/', [CategoriaController::class, 'store'])->name('categorias.store');
    Route::get('/', [CategoriaController::class, 'index'])->name('categorias.index');
});

Route::group(['prefix' => 'produtos', 'middleware' => 'auth:api'], function () {
    Route::get('/', [ProdutoController::class, 'index'])->name('produtos.index');
});
