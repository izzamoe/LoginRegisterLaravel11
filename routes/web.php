<?php

use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', 'App\Http\Controllers\AuthControllers@login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', 'App\Http\Controllers\AuthControllers@register');

Route::get('/home', 'App\Http\Controllers\HomeControllers@index')->name('home');

Route::post('/logout', 'App\Http\Controllers\AuthControllers@logout')->name('logout');
