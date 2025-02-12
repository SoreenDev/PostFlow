<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;

Route::prefix('auth')->name('auth.')->controller(AuthController::class)->group(function (){

    Route::post('/register','register');
    Route::post('/login','login');
    Route::delete('/logout','logout')->middleware('auth:api');

});

Route::apiResource('users', UserController::class)->parameters(['users' => 'id'])->middleware('auth:api');

