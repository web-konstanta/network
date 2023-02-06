<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['namespace' => 'Cabinet', 'prefix' => 'home', 'middleware' => 'auth'], function () {
    Route::get('/', 'IndexController')->name('cabinet.index');
});

Auth::routes();
