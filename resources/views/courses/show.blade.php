@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $course->name }}</h1>
        <p><strong>Description:</strong> {{ $course->description }}</p>
        <p><strong>Category:</strong> {{ $course->category->name }}</p>
        @if($course->image)
            <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->name }}" class="img-thumbnail" style="max-width: 200px;">
        @endif
        <p><strong>User:</strong> {{ $course->user->name }}</p>
        <a href="{{ route('courses.edit', $course) }}" class="btn btn-primary">Edit
        </a>
        <hr>
        <div class="mb-4">
            <h2>Units</h2>
            <a href="{{ route('units.create', ['course_id' => $course->id]) }}" class="btn btn-primary mb-3">Create New Unit</a>
            @if($units->isEmpty())
                <p>No posts available.</p>
            @else
                <ul class="list-group">
                    @foreach($units as $unit)
                        <li class="list-group-item">
                            <h5>{{ $unit->title }}</h5>
                            <a href="{{ route('units.show', $unit->id) }}" class="btn btn-outline-info btn-sm">View</a>
                            <a href="{{ route('units.edit', $unit->id) }}" class="btn btn-outline-secondary btn-sm">Edit</a>
                            <form action="{{ route('units.destroy', $unit->id) }}" method="POST" class="d-inline">
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
