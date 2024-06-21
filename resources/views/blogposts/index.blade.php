@extends('layouts.app')

@section('content')
    <h1>Blog Posts</h1>
    <a href="{{ route('blogposts.create') }}">Create New Blog Post</a>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <ul>
        @foreach($blogPosts as $blogPost)
            <li>
                <a href="{{ route('blogposts.show', $blogPost) }}">{{ $blogPost->title }}</a>
                <a href="{{ route('blogposts.edit', $blogPost) }}">Edit</a>
                <form action="{{ route('blogposts.destroy', $blogPost) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
