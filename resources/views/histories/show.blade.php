@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">{{ $history->name }}</h1>
        <div class="mb-3">
            <p>{{ $history->description }}</p>
        </div>
        @if($history->image)
            <div class="mb-3">
                <img src="{{ asset('storage/' . $history->image) }}" alt="{{ $history->name }}" class="img-fluid" width="200">
            </div>
        @endif
        <div class="mb-3">
            <p><strong>User ID:</strong> {{ $history->user_id }}</p>
        </div>
        <div class="mb-3">
            <p><strong>Category ID:</strong> {{ $history->category_id }}</p>
        </div>
        <div class="d-flex mb-4">
            <a href="{{ route('histories.edit', $history) }}" class="btn btn-outline-secondary me-2">Edit</a>
            <form action="{{ route('histories.destroy', $history) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger">Delete</button>
            </form>
        </div>
        <hr>
        <div class="mb-4">
            <h2>Chapters</h2>
            <a href="{{ route('chapters.create', ['history_id' => $history->id]) }}" class="btn btn-primary mb-3">Create New Chapter</a>
            @if($chapters->isEmpty())
                <p>No chapters available.</p>
            @else
                <ul class="list-group">
                    @foreach($chapters as $chapter)
                        <li class="list-group-item">
                            <h5>{{ $chapter->title }}</h5>
                            <p>{{ Str::limit($chapter->content, 150) }}</p>
                            <a href="{{ route('chapters.show', $chapter->id) }}" class="btn btn-outline-info btn-sm">View</a>
                            <a href="{{ route('chapters.edit', $chapter->id) }}" class="btn btn-outline-secondary btn-sm">Edit</a>
                            <form action="{{ route('chapters.destroy', $chapter->id) }}" method="POST" class="d-inline">
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
