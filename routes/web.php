<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/posts', [\App\Http\Controllers\PostController::class,'index'])->name('posts.index');
Route::get('/posts/{id}', [\App\Http\Controllers\PostController::class,'show'])->name('posts.show');

//Route::get('view',[\App\Http\Controllers\PostController::class,'viewComment'])->name('view');
//Route::get('viewShow/{$id}',[\App\Http\Controllers\PostController::class,'viewshow'])->name('viewshow');
Route::middleware('auth')->group(function () {
    // routes/web.php
    Route::post('/posts', [\App\Http\Controllers\PostController::class,'store'])->name('posts.store');
    Route::put('/posts/{id}', [\App\Http\Controllers\PostController::class,'update'])->name('posts.update');
    Route::delete('/posts/{id}', [\App\Http\Controllers\PostController::class,'destroy'])->name('posts.destroy');

    Route::post('comments.store',[\App\Http\Controllers\CommentController::class,'store'])->name('comments.store');
    Route::get('comments',[\App\Http\Controllers\CommentController::class,'index'])->name('comments.index');
});
Route::get('/dashboard',[\App\Http\Controllers\PostController::class,'Views'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::post('logout',[\App\Http\Controllers\Auth\AuthenticatedSessionController::class,'destroy'])->name('logout');

require __DIR__.'/auth.php';
