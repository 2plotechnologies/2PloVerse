@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Welcome to 2PloVerse!') }}
                </div>
            </div>

            <!-- Courses Section -->
            <div class="card mb-4">
                <div class="card-header">{{ __('Courses') }}</div>
                <div class="card-body">
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
                    @endif
                </div>
            </div>

            <!-- Histories Section -->
            <div class="card mb-4">
                <div class="card-header">{{ __('Histories') }}</div>
                <div class="card-body">
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
                    @endif
                </div>
            </div>

            <!-- Blogs Section -->
            <div class="card mb-4">
                <div class="card-header">{{ __('Blogs') }}</div>
                <div class="card-body">
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
                    @endif
                </div>
            </div>

            <!-- Magazines Section -->
            <div class="card mb-4">
                <div class="card-header">{{ __('Magazines') }}</div>
                <div class="card-body">
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
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
