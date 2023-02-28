<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['namespace' => 'Vendor', 'prefix' => 'home', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', 'IndexController')->name('cabinet.index');
    Route::get('/{user}/edit', 'EditController')->name('cabinet.edit');
    Route::put('/{user}', 'UpdateController')->name('cabinet.update');
    Route::group(['namespace' => 'Post', 'prefix' => 'post'], function () {
        Route::get('/', 'IndexController')->name('posts.index');
        Route::get('/create', 'CreateController')->name('posts.create');
        Route::post('/', 'StoreController')->name('posts.store');
        Route::get('/{post}', 'ShowController')->name('posts.show');
        Route::get('/{post}/edit', 'EditController')->name('posts.edit');
        Route::put('/{post}/update', 'UpdateController')->name('posts.update');
        Route::delete('/{post}/delete', 'DestroyController')->name('posts.destroy');
    });
    Route::group(['namespace' => 'User', 'prefix' => 'user'], function () {
        Route::get('/{user}', 'ShowController')->name('users.show');
    });
});

Auth::routes(['verify' => true]);
