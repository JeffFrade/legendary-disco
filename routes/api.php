<?php

use App\Http\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');
Route::post('refresh', [AuthController::class, 'refresh'])->middleware('auth:api');
Route::post('me', [AuthController::class, 'me'])->middleware('auth:api');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');
