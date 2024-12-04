<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// DASHBOARD
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// AUTH
Route::group(['middleware' => 'guest'], function() {

    Route::get('/register', [AuthController::class , 'register'] )->name('register');

    Route::post('/register', [AuthController::class , 'store'] );

    Route::get('/login', [AuthController::class , 'login'] )->name('login');

    Route::post('/login', [AuthController::class , 'authenticate'] );

});

Route::post('/logout', [AuthController::class , 'logout'] )->middleware('auth')->name('logout');

// IDEAS
Route::post('/ideas', [IdeaController::class , 'store'] )->name('ideas.store');

Route::get('/ideas/{idea}', [IdeaController::class , 'show'] )->name('ideas.show');

Route::get('/ideas/{idea}/edit', [IdeaController::class , 'edit'] )->name('ideas.edit')->middleware('auth');

Route::put('/ideas/{idea}', [IdeaController::class , 'update'] )->name('ideas.update')->middleware('auth');


// COMMENTS
Route::resource('ideas.comments', CommentController ::class)->only(['store'])->middleware('auth');

// USER
Route::resource('users', UserController::class)->only('show');

Route::resource('users', UserController::class)->only('edit', 'update')->middleware('auth');

Route::get('profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');

// TERMS
Route::get('/terms', function() { return view('terms'); } )->name('terms');

// FEED
Route::get('/feed', [FeedController::class, 'index'])->name('feed');

// DELETE js
Route::delete('/ideas/{idea}', [IdeaController::class, 'destroy'])->name('ideas.destroy');



