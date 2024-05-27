<?php

use App\Http\Controllers\AuthControllers;
use App\Http\Controllers\HomeControllers;
use App\Http\Controllers\UserSettingsControllers;
use App\Http\Middleware\IsLogin;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthControllers::class, 'CheckLogin']);


Route::group(['prefix' => '/auth', "as" => "auth."], function () {
    Route::get('/login', [AuthControllers::class, 'LoginPage'])->name("login");
    Route::post('/login', [AuthControllers::class, 'login'])->name("login.proses");
    Route::get('/register', [AuthControllers::class, 'RegisterPage'])->name('register');
    Route::post('/register', [AuthControllers::class, 'register'])->name("register.proses");
});
Route::group(['prefix' => "dashboard", "as" => "dashboard.", "middleware" => IsLogin::class], function () {
//    Route::get('/', [HomeControllers::class, 'index'])->name('home');
    Route::get('/', [HomeControllers::class, 'index'])->name('store');
    Route::get('/user', [UserSettingsControllers::class, 'index'])->name('user');
    Route::post('/user', [UserSettingsControllers::class, 'update'])->name('user.update');
    Route::delete('/user', [UserSettingsControllers::class, 'destroy'])->name('user.destroy');
    Route::post('/user/password', [UserSettingsControllers::class, 'changePassword'])->name('user.password');

    Route::get('/library', [UserSettingsControllers::class, 'library'])->name('library');
//

    Route::get('/logout', [AuthControllers::class, 'logout'])->name('logout');

//    payment


});


Route::post('donation/pay', [App\Http\Controllers\DonationController::class, 'pay'])->name('donation.pay');

// view
Route::get('donation', function () {

    return view('donation');
})->name('donation');
