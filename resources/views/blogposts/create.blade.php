@extends('layouts.app')

@section('content')
    <h1>Create Blog Post</h1>
    <form action="{{ route('blogposts.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div>
            <label for="content">Content</label>
            <textarea id="content" name="content" required></textarea>
        </div>
        <div>
            <label for="blog_id">Blog</label>
            <select id="blog_id" name="blog_id" required>
                @foreach($blogs as $blog)
                    <option value="{{ $blog->id }}">{{ $blog->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Create</button>
    </form>
@endsection
