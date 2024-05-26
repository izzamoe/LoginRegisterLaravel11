<?php

use App\Http\Controllers\Api\AuthControllers;
use App\Http\Controllers\Api\ProdukControllers;
use App\Http\Controllers\Api\ProfileControllers;
use Illuminate\Support\Facades\Route;

Route::prefix("auth")->controller(AuthControllers::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/register', 'register');
    Route::get('/logout', 'logout')->middleware('auth:sanctum');
});

Route::prefix("produk")->controller(ProdukControllers::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
    Route::post('/buy', 'buy')->middleware('auth:sanctum');
    Route::put('/upload', 'upload');


});

Route::prefix("profile")->middleware('auth:sanctum')->controller(ProfileControllers::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/library', 'library');
});


// get hello world
Route::get('/', function () {
    return response()->json([
        'message' => 'Hello World'
    ]);
});
