@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>{{ $blog->name }}</h1>
    <div class="mb-3">
        <p>{{ $blog->description }}</p>
    </div>
    @if($blog->image)
        <div class="mb-3">
            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->name }}" class="img-fluid" width="200">
        </div>
    @endif

    <h2 class="mt-4">Posts</h2>
    <ul>
        @foreach($posts as $post)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('blogposts.showUser', $post) }}">{{ $post->title }}</a>
            </li>
        @endforeach
    </ul>

</div>
@endsection
