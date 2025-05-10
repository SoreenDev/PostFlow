<?php

use App\Http\Controllers\api\v1\AuthController;
use App\Http\Controllers\api\v1\CommentController;
use App\Http\Controllers\api\v1\PostCategoryController;
use App\Http\Controllers\api\v1\PostController;
use App\Http\Controllers\api\v1\TagController;
use App\Http\Controllers\api\v1\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(callback: function () {
    Route::prefix('/auth')->controller(AuthController::class)->group(function () {
       Route::post('/register', 'register');
       Route::post('/login', 'login');
       Route::post('/logout', 'logout')->middleware('auth:sanctum');
    });
    Route::apiResource('/users', UserController::class)
        ->middleware('auth:sanctum');
    Route::apiResource('/post-categories', PostCategoryController::class)
        ->middleware('auth:sanctum');
    Route::apiResource('/tags', TagController::class)
        ->middleware('auth:sanctum');

    Route::prefix('/posts')->controller(PostController::class)->group(function () {
        Route::get('/dashboard', 'dashboardIndex')->middleware('auth:sanctum');
        Route::post('/like/{post}', 'like')->middleware('auth:sanctum');
        Route::post('/comment/{post}', 'comment')->middleware('auth:sanctum');
        Route::get('/', 'index');
        Route::post('/', 'store')->middleware('auth:sanctum');
        Route::get('/{post}', 'show')->middleware('auth:sanctum');
        Route::put('/{post}', 'update')->middleware('auth:sanctum');
        Route::delete('/{post}', 'destroy')->middleware('auth:sanctum');
    });
    Route::prefix('/comments')->controller(CommentController::class)->group(function () {
        Route::post('/replay/{comment}', 'relay')->middleware('auth:sanctum');
        Route::post('/like/{comment}', 'like')->middleware('auth:sanctum');
        Route::get('/{comment}', 'show')->middleware('auth:sanctum');
        Route::put('/{comment}', 'update')->middleware('auth:sanctum');
        Route::delete('/{comment}', 'destroy')->middleware('auth:sanctum');
    });
});
