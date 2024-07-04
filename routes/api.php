<?php

use App\Http\AuthController;
use App\Http\CategoriaController;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');
Route::post('refresh', [AuthController::class, 'refresh'])->middleware('auth:api');
Route::post('me', [AuthController::class, 'me'])->middleware('auth:api');

Route::group(['prefix' => 'categorias', 'middleware' => 'auth:api'], function () {
    Route::get('/', [CategoriaController::class, 'index'])->name('categorias.index');
});
