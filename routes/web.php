<?php

use App\Http\Controllers\Admin\Comment\IndexController as CommentIndexController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\Post\IndexController as PostIndexController;
use App\Http\Controllers\Admin\Tag\IndexController as TagIndexController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {
        Route::get('/', [IndexController::class, 'index'])->name('admin.main');
        Route::post('/', [IndexController::class, 'imgBase64'])->name('admin.base');
        Route::resource('tags', TagIndexController::class);
        Route::resource('posts', PostIndexController::class);
        Route::resource('comments', CommentIndexController::class);
});

