<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Dashboard\Panel;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
        return redirect()->route('dashboard');
});
Route::get('/auth/register', Register::class)->name('register');
Route::get('/auth/login', Login::class)->name('login');

Route::get('/posts', App\Livewire\Post\Index::class);
Route::get('/admin/dashboard', Panel::class)->name('dashboard');
