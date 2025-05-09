<?php

use App\Http\Controllers\api\v1\AuthController;
use App\Http\Controllers\api\v1\PostCategoryController;
use App\Http\Controllers\api\v1\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::prefix('/auth')->controller(AuthController::class)->group(function () {
       Route::post('/register', 'register');
       Route::post('/login', 'login');
       Route::post('/logout', 'logout')->middleware('auth:sanctum');
    });
    Route::apiResource('/users', UserController::class)
        ->middleware('auth:sanctum');
    Route::apiResource('/post-categories', PostCategoryController::class)
        ->middleware('auth:sanctum');
});
