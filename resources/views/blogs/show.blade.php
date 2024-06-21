@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">{{ $blog->name }}</h1>
        <div class="mb-3">
            <p>{{ $blog->description }}</p>
        </div>
        @if($blog->image)
            <div class="mb-3">
                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->name }}" class="img-fluid" width="200">
            </div>
        @endif
        <div class="mb-3">
            <p><strong>User ID:</strong> {{ $blog->user_id }}</p>
        </div>
        <div class="mb-3">
            <p><strong>Category ID:</strong> {{ $blog->category_id }}</p>
        </div>
        <div class="d-flex">
            <a href="{{ route('blogs.edit', $blog) }}" class="btn btn-outline-secondary me-2">Edit</a>
            <form action="{{ route('blogs.destroy', $blog) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection
