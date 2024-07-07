@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>{{ $unit->title }}</h1>
        <a href="{{ route('courses.show', $unit->course_id) }}" class="btn btn-outline-secondary">Back to Course</a>
        <hr>
        <div class="mb-4">
            <h2>Lessons</h2>
            <a href="{{ route('lessons.create', ['unit_id' => $unit->id]) }}" class="btn btn-primary mb-3">Create New Lesson</a>
            @if($lessons->isEmpty())
                <p>No lessons available.</p>
            @else
                <ul class="list-group">
                    @foreach($lessons as $lesson)
                        <li class="list-group-item">
                            <h5>{{ $lesson->title }}</h5>
                            <p>{{ Str::limit($lesson->content, 150) }}</p>
                            <a href="{{ route('lessons.show', $lesson->id) }}" class="btn btn-outline-info btn-sm">View</a>
                            <a href="{{ route('lessons.edit', $lesson->id) }}" class="btn btn-outline-secondary btn-sm">Edit</a>
                            <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection
