<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MotorbikeController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [UserController::class, 'getUser']);
    Route::apiResource('/products', ProductController::class);
    Route::apiResource('/customers', CustomerController::class);
    Route::apiResource('/services', ServiceController::class);
    Route::apiResource('/motorbikes', MotorbikeController::class);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy']);
});

Route::post('login', [AuthenticatedSessionController::class, 'store']);
Route::post('register', [RegisteredUserController::class, 'store']);

