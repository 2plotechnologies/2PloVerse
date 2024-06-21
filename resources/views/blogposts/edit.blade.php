@extends('layouts.app')

@section('content')
    <h1>Edit Blog Post</h1>
    <form action="{{ route('blogposts.update', $blogPost) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ $blogPost->title }}" required>
        </div>
        <div>
            <label for="content">Content</label>
            <textarea id="content" name="content" required>{{ $blogPost->content }}</textarea>
        </div>
        <div>
            <label for="blog_id">Blog</label>
            <select id="blog_id" name="blog_id" required>
                @foreach($blogs as $blog)
                    <option value="{{ $blog->id }}" {{ $blog->id == $blogPost->blog_id ? 'selected' : '' }}>{{ $blog->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
