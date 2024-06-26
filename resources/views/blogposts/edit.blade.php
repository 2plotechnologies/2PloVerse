@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Edit Blog Post</h1>
        <form action="{{ route('blogposts.update', $post) }}" method="POST">
            @csrf
            @method('PUT') <!-- Usar PUT o PATCH para la actualización -->
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $blogPost->title }}" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" rows="5" required>{{ $blogPost->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>
    </div>
@endsection
