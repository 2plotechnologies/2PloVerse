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

// Rutas para vistas de usuario
Route::get('courses/user/{course}', [CourseController::class, 'showUser'])->name('courses.showUser');
Route::get('histories/user/{history}', [HistoryController::class, 'showUser'])->name('histories.showUser');
Route::get('blogs/user/{blog}', [BlogController::class, 'showUser'])->name('blogs.showUser');
Route::get('magazines/user/{magazine}', [MagazineController::class, 'showUser'])->name('magazines.showUser');

Route::get('blogposts/user/{blogPost}', [BlogPostController::class, 'showUser'])->name('blogposts.showUser');
Route::get('chapters/user/{chapter}', [ChapterController::class, 'showUser'])->name('chapters.showUser');
Route::get('/lessons/user/{id}', [LessonController::class, 'showUser'])->name('lessons.showUser');
Route::get('magazineposts/user/{magazinePost}', [MagazinePostController::class, 'showUser'])->name('magazineposts.showUser');
