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
        <div class="d-flex mb-4">
            <a href="{{ route('blogs.edit', $blog) }}" class="btn btn-outline-secondary me-2">Edit</a>
            <form action="{{ route('blogs.destroy', $blog) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger">Delete</button>
            </form>
        </div>
        <hr>
        <div class="mb-4">
            <h2>Blog Posts</h2>
            <a href="{{ route('blogposts.create', ['blog_id' => $blog->id]) }}" class="btn btn-primary mb-3">Create New Post</a>
            @if($posts->isEmpty())
                <p>No posts available.</p>
            @else
                <ul class="list-group">
                    @foreach($posts as $post)
                        <li class="list-group-item">
                            <h5>{{ $post->title }}</h5>
                            <p>{{ Str::limit($post->content, 150) }}</p>
                            <a href="{{ route('blogposts.show', $post) }}" class="btn btn-outline-info btn-sm">View</a>
                            <a href="{{ route('blogposts.edit', $post) }}" class="btn btn-outline-secondary btn-sm">Edit</a>
                            <form action="{{ route('blogposts.destroy', $post->id) }}" method="POST" class="d-inline">
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
