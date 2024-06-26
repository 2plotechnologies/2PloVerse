@extends('layouts.app')

@section('content')
    <h1>Create Blog Post</h1>
    <form action="{{ route('blogposts.store') }}" method="POST">
        @csrf
        <input type="hidden" name="blog_id" value="{{ $blogId }}">
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div>
            <label for="content">Content</label>
            <textarea id="content" name="content" required></textarea>
        </div>
        <button type="submit">Create</button>
    </form>
@endsection
