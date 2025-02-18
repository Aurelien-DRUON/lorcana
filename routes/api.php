<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\MeController;
use App\Http\Controllers\SetController;

Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store']);
Route::get('/me', [MeController::class, 'show']);

Route::middleware('auth:sanctum')->get('/sets', [SetController::class, 'index']);
Route::middleware('auth:sanctum')->get('/sets/{id}', [SetController::class, 'show']);
Route::middleware('auth:sanctum')->get('/sets/{id}/cards', [SetController::class, 'getCards']);
