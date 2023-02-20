<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['namespace' => 'Cabinet', 'prefix' => 'home', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', 'IndexController')->name('cabinet.index');
    Route::get('/{user}/edit', 'EditController')->name('cabinet.edit');
    Route::put('/{user}', 'UpdateController')->name('cabinet.update');
    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
        Route::get('/create', 'CreateController')->name('posts.create');
        Route::post('/', 'StoreController')->name('posts.store');
        Route::get('/{post}', 'ShowController')->name('posts.show');
    });
});

Auth::routes(['verify' => true]);
