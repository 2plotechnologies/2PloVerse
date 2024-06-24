<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HistoryController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('blogs', BlogController::class)->middleware('auth');

Route::resource('blogposts', BlogPostController::class)->middleware('auth');

Route::resource('courses', CourseController::class)->middleware('auth');

Route::resource('histories', HistoryController::class)->middleware('auth');

