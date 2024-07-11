@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Dashboard</h1>
    <hr>
    <!-- Courses Section -->
    <h2>My Courses</h2>
    @if($courses->isEmpty())
        <p>No courses available.</p>
    @else
        <div class="row">
            @foreach($courses as $course)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $course->image) }}" class="card-img-top" alt="{{ $course->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->name }}</h5>
                            <p class="card-text">{{ Str::limit($course->description, 100) }}</p>
                            <a href="{{ route('courses.show', $course) }}" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a href="{{ route('courses.index') }}" class="btn btn-outline-primary">View More Courses</a>
    @endif
    <hr>

    <!-- Histories Section -->
    <h2>My Stories</h2>
    @if($histories->isEmpty())
        <p>No histories available.</p>
    @else
        <div class="row">
            @foreach($histories as $history)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $history->image) }}" class="card-img-top" alt="{{ $history->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $history->name }}</h5>
                            <p class="card-text">{{ Str::limit($history->description, 100) }}</p>
                            <a href="{{ route('histories.show', $history) }}" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a href="{{ route('histories.index') }}" class="btn btn-outline-primary">View More Histories</a>
    @endif
    <hr>

    <!-- Blogs Section -->
    <h2>My Blogs</h2>
    @if($blogs->isEmpty())
        <p>No blogs available.</p>
    @else
        <div class="row">
            @foreach($blogs as $blog)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top" alt="{{ $blog->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $blog->name }}</h5>
                            <p class="card-text">{{ Str::limit($blog->description, 100) }}</p>
                            <a href="{{ route('blogs.show', $blog) }}" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a href="{{ route('blogs.index') }}" class="btn btn-outline-primary">View More Blogs</a>
    @endif
    <hr>

    <!-- Magazines Section -->
    <h2>My Magazines</h2>
    @if($magazines->isEmpty())
        <p>No magazines available.</p>
    @else
        <div class="row">
            @foreach($magazines as $magazine)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $magazine->image) }}" class="card-img-top" alt="{{ $magazine->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $magazine->name }}</h5>
                            <p class="card-text">{{ Str::limit($magazine->description, 100) }}</p>
                            <a href="{{ route('magazines.show', $magazine) }}" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a href="{{ route('magazines.index') }}" class="btn btn-outline-primary">View More Magazines</a>
    @endif
</div>
@endsection
