<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\MagazineController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\MagazinePostController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\DashboardController;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('blogs', BlogController::class)->middleware('auth');

Route::resource('blogposts', BlogPostController::class)->middleware('auth');

Route::resource('courses', CourseController::class)->middleware('auth');

Route::resource('histories', HistoryController::class)->middleware('auth');

Route::resource('magazines', MagazineController::class)->middleware('auth');

Route::resource('chapters', ChapterController::class)->middleware('auth');

Route::resource('magazineposts', MagazinePostController::class)->middleware('auth');

Route::resource('units', UnitController::class)->middleware('auth');

Route::resource('lessons', LessonController::class)->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');

