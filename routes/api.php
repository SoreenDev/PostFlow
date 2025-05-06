<?php

use App\Http\Controllers\api\v1\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::prefix('/auth')->controller(AuthController::class)->group(function () {
       Route::post('/register', 'register');
       Route::post('/login', 'login');
       Route::post('/logout', 'logout')->middleware('auth:sanctum');
    });
});
