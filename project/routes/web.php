<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/test', [MainController::class, 'test'])->name('test');

Route::group(['namespace' => 'post', 'prefix' => 'post'], function () {
    Route::get('/index', [PostController::class, 'index'])->name('post.index');
    Route::get('/{post}', [PostController::class, 'show'])->name('post.show');

    Route::get('/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/{post}/updating', [PostController::class, 'update'])->name('post.update');
});
