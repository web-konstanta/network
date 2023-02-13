<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['namespace' => 'Cabinet', 'prefix' => 'home', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', 'IndexController')->name('cabinet.index');
    Route::get('/{user}/edit', 'EditController')->name('cabinet.edit');
    Route::put('/{user}', 'UpdateController')->name('cabinet.update');
});

Auth::routes(['verify' => true]);
