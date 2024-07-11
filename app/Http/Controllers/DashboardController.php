<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\History;
use App\Models\Blog;
use App\Models\Magazine;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $courses = Course::where('user_id', $userId)->orderBy('id', 'desc')->take(3)->get();
        $histories = History::where('user_id', $userId)->orderBy('id', 'desc')->take(3)->get();
        $blogs = Blog::where('user_id', $userId)->orderBy('id', 'desc')->take(3)->get();
        $magazines = Magazine::where('user_id', $userId)->orderBy('id', 'desc')->take(3)->get();

        return view('dashboard.index', compact('courses', 'histories', 'blogs', 'magazines'));
    }
}
