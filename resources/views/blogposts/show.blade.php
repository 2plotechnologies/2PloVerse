@extends('layouts.app')

@section('content')
    <h1>{{ $blogPost->title }}</h1>
    <p>{{ $blogPost->content }}</p>
    <a href="{{ route('blogposts.edit', $blogPost) }}">Edit</a>
    <form action="{{ route('blogposts.destroy', $blogPost) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endsection
