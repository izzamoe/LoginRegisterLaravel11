<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControllers;
use App\Http\Controllers\HomeControllers;

Route::get('/', [AuthControllers::class, 'CheckLogin']);


Route::group(['prefix' => '/auth', "as" => "auth."], function () {
    Route::get('/login', [AuthControllers::class, 'LoginPage'])->name('login');
    Route::post('/login', [AuthControllers::class, 'login']);
    Route::get('/register', [AuthControllers::class, 'RegisterPage'])->name('register');
    Route::post('/register', [AuthControllers::class, 'register']);
});
Route::group(['prefix' => "dashboard", "as" => "dashboard."], function () {
    Route::get('/', [HomeControllers::class, 'index'])->name('home');
    Route::get('/logout', [AuthControllers::class, 'logout'])->name('logout');
});
