@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>{{ $magazine->name }}</h1>
    <div class="mb-3">
        <p>{{ $magazine->description }}</p>
    </div>
    @if($magazine->image)
        <div class="mb-3">
            <img src="{{ asset('storage/' . $magazine->image) }}" alt="{{ $magazine->name }}" class="img-fluid" width="200">
        </div>
    @endif

    <h2 class="mt-4">Posts</h2>
    <ul>
        @foreach($magazinePosts as $post)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('magazineposts.showUser', $post) }}">{{ $post->title }}</a>
            </li>
        @endforeach
    </ul>

</div>
@endsection
