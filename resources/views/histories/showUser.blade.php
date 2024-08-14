@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>{{ $history->name }}</h1>
    <div class="mb-3">
        <p>{{ $history->description }}</p>
    </div>
    @if($history->image)
        <div class="mb-3">
            <img src="{{ asset('storage/' . $history->image) }}" alt="{{ $history->name }}" class="img-fluid" width="200">
        </div>
    @endif

    <h2 class="mt-4">Chapters</h2>
    <ul>
        @foreach($chapters as $chapter)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('chapters.showUser', $chapter) }}">{{ $chapter->title }}</a>
            </li>
        @endforeach
    </ul>

</div>
@endsection
