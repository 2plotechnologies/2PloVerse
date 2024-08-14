<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\History;
use App\Models\Blog;
use App\Models\Magazine;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = Course::all();
        $histories = History::all();
        $blogs = Blog::all();
        $magazines = Magazine::all();

        return view('home', compact('courses', 'histories', 'blogs', 'magazines'));
    }
}
