@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $course->name }}</h1>
        <p><strong>Description:</strong> {{ $course->description }}</p>
        <p><strong>Category:</strong> {{ $course->category->name }}</p>
        @if($course->image)
            <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->name }}" class="img-thumbnail" style="max-width: 200px;">
        @endif
        <p><strong>User ID:</strong> {{ $course->user_id }}</p>
        <a href="{{ route('courses.edit', $course) }}" class="btn btn-primary">
        </a>
    </div>
@endsection
