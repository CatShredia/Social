<?php

use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\TagController as AdminTagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\AdminAccess;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/test', [MainController::class, 'test'])->name('test');

// posts
Route::group(['prefix' => 'post'], function () {
    // all posts
    Route::get('index', [PostController::class, 'index'])->name('post.index');

    // creating
    Route::get('create', [PostController::class, 'create'])->name('post.create');
    Route::post('store', [PostController::class, 'store'])->name('post.store');

    // show one
    Route::get('{post}', [PostController::class, 'show'])->name('post.show');

    // editing
    Route::get('{post}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::put('{post}/updating', [PostController::class, 'update'])->name('post.update');
});

// admin
Route::group(['namespace' => 'admin', 'prefix' => 'admin', 'middleware' => [AdminAccess::class]], function () {
    // index
    Route::get('', [AdminIndexController::class, 'index'])->name('admin.index');
    Route::get('/categories', [AdminCategoryController::class, 'index'])->name('admin.category');
    Route::get('/tags', [AdminTagController::class, 'index'])->name('admin.tag');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/access', [MainController::class, 'accessDenied'])->name('accessDenied');
