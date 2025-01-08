<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\IdeaController as AdminIdeaController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;


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

// PROFILE
Route::get('/profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');
Route::resource('users', UserController::class)->only(['show', 'edit', 'update'])->middleware('auth');

// FOLLOW & UNFOLLOW
Route::post('/users/{user}/follow', [UserController::class, 'follow'])->name('users.follow')->middleware('auth');
Route::post('/users/{user}/unfollow', [UserController::class, 'unfollow'])->name('users.unfollow')->middleware('auth');

// LIKE
Route::post('/ideas/{idea}/like', [LikeController::class, 'likeIdea'])->name('ideas.like');
Route::post('/ideas/{idea}/unlike', [LikeController::class, 'unlikeIdea'])->name('ideas.unlike');
Route::post('/comments/{comment}/like', [LikeController::class, 'likeComment'])->name('comments.like');
Route::post('/comments/{comment}/unlike', [LikeController::class, 'unlikeComment'])->name('comments.unlike');

// ADMIN
Route::middleware(['auth', 'can:admin'])->prefix('/admin')->as('admin.')->group(function() {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', AdminUserController::class)->only(['index', 'destroy', 'show', 'edit', 'update']);
    Route::resource('ideas', AdminIdeaController::class)->only(['index', 'destroy', 'show', 'edit', 'update']);
    Route::resource('comments', AdminCommentController::class)->only('index', 'destroy');
});
