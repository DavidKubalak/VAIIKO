<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


// AUTH

Route::group(['middleware' => 'guest'], function() {

    Route::get('/register', [AuthController::class , 'register'] )->name('register');

    Route::post('/register', [AuthController::class , 'store'] );

    Route::get('/login', [AuthController::class , 'login'] )->name('login');

    Route::post('/login', [AuthController::class , 'authenticate'] );

});

Route::post('/logout', [AuthController::class , 'logout'] )->middleware('auth')->name('logout');
