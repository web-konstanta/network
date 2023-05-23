<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])
    ->middleware('verified')
    ->name('home');

Route::group(['namespace' => 'Vendor', 'prefix' => 'home', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', 'IndexController')->name('cabinet.index');
    Route::get('/{user}/edit', 'EditController')->name('cabinet.edit');
    Route::put('/{user}', 'UpdateController')->name('cabinet.update');
    Route::get('/search', 'SearchController')->name('cabinet.search');
    Route::get('/search/user', 'SearchUserController')->name('cabinet.user.search');
    Route::delete('/delete/{user}', 'DestroyController')->name('cabinet.user.delete');
    Route::group(['namespace' => 'Post', 'prefix' => 'post'], function () {
        Route::get('/', 'IndexController')->name('posts.index');
        Route::get('/create', 'CreateController')->name('posts.create');
        Route::post('/', 'StoreController')->name('posts.store');
        Route::get('/{post}', 'ShowController')->name('posts.show');
        Route::get('/{post}/edit', 'EditController')->name('posts.edit');
        Route::put('/{post}/update', 'UpdateController')->name('posts.update');
        Route::delete('/{post}/delete', 'DestroyController')->name('posts.destroy');
        Route::get('/saved/users/posts', 'SavedPostsController')->name('posts.saved');
    });
    Route::group(['namespace' => 'User', 'prefix' => 'user'], function () {
        Route::get('/{user}', 'ShowController')->name('users.show');
        Route::post('/{user}', 'SubscriberController')->name('users.subscriber');
        Route::post('/unfollow/{user}', 'UnfollowController')->name('users.unfollow');
        Route::get('/subscribers/{user}', 'SubscriberListController')->name('users.subscriber-list');
        Route::get('/followers/{user}', 'FollowersListController')->name('users.followers-list');
        Route::get('/post/{post}', 'ShowPostController')->name('users.post');
        Route::post('/post/like/{postId}', 'LikeController')->name('users.like');
        Route::post('/post/unlike/{postId}', 'UnlikeController')->name('users.like');
        Route::post('/post/comment/{postId}/{text}', 'CommentController')->name('users.comment');
        Route::delete('/comment/{comment}', 'CommentDeleteController')->name('users.comments.delete');
        Route::post('/post/save/{postId}', 'SavePostController')->name('users.save.post');
        Route::post('/post/unsave/{postId}', 'UnsavePostController')->name('users.unsave.post');
        Route::post('/post/complain/{postId}', 'ComplainController')->name('users.complain');
    });
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'IndexController')->name('admin.index');
    Route::group(['namespace' => 'Post', 'prefix' => 'post'], function () {
        Route::get('/', 'IndexController')->name('admin.post.index');
        Route::get('/{post}', 'ShowController')->name('admin.post.show');
        Route::post('/approve/{post}', 'ApproveController')->name('admin.post.approve');
        Route::post('/delete/{post}', 'DestroyController')->name('admin.post.destroy');
    });
    Route::group(['namespace' => 'User', 'prefix' => 'user', 'middleware' => 'admin_protection'], function () {
        Route::get('/', 'IndexController')->name('admin.user.index');
        Route::get('/{user}', 'ShowController')->name('admin.user.show');
        Route::get('/edit/{user}', 'EditController')->name('admin.user.edit');
        Route::patch('/update/{user}', 'UpdateController')->name('admin.user.update');
        Route::delete('/delete/{user}', 'DestroyController')->name('admin.user.delete');
    });
});

Auth::routes(['verify' => true]);
