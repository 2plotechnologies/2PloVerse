<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\BlogController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('blogs', BlogController::class);

Route::resource('blogposts', BlogPostController::class);
