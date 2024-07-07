@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">{{ $magazine->name }}</h1>
        <div class="mb-3">
            <p>{{ $magazine->description }}</p>
        </div>
        @if($magazine->image)
            <div class="mb-3">
                <img src="{{ asset('storage/' . $magazine->image) }}" alt="{{ $magazine->name }}" class="img-fluid" width="200">
            </div>
        @endif
        <div class="mb-3">
            <p><strong>User:</strong> {{ $magazine->user->name }}</p>
        </div>
        <div class="mb-3">
            <p><strong>Category:</strong> {{ $magazine->category->name }}</p>
        </div>
        <div class="d-flex mb-4">
            <a href="{{ route('magazines.edit', $magazine) }}" class="btn btn-outline-secondary me-2">Edit</a>
            <form action="{{ route('magazines.destroy', $magazine) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger">Delete</button>
            </form>
        </div>
        <hr>
        <div class="mb-4">
            <h2>Magazine Posts</h2>
            <a href="{{ route('magazineposts.create', ['magazine_id' => $magazine->id]) }}" class="btn btn-primary mb-3">Create New Magazine Post</a>
            @if($magazinePosts->isEmpty())
                <p>No magazine posts available.</p>
            @else
                <ul class="list-group">
                    @foreach($magazinePosts as $magazinePost)
                        <li class="list-group-item">
                            <h5>{{ $magazinePost->title }}</h5>
                            <p>{{ Str::limit($magazinePost->content, 150) }}</p>
                            <a href="{{ route('magazineposts.show', $magazinePost->id) }}" class="btn btn-outline-info btn-sm">View</a>
                            <a href="{{ route('magazineposts.edit', $magazinePost->id) }}" class="btn btn-outline-secondary btn-sm">Edit</a>
                            <form action="{{ route('magazineposts.destroy', $magazinePost->id) }}" method="POST" class="d-inline">
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
