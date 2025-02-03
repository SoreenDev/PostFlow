<?php

use App\Http\Controllers\Api\AuthController;

Route::prefix('auth')->name('auth.')->controller(AuthController::class)->group(function (){

    Route::post('/register','register');
    Route::post('/login','login');
    Route::delete('/logout','logout')->middleware('auth:api');

});

