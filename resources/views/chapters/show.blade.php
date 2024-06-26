@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>{{ $chapter->title }}</h1>
        <p>{{ $chapter->content }}</p>
        <a href="{{ route('histories.show', $chapter->history_id) }}" class="btn btn-outline-secondary">Back to History</a>
    </div>
@endsection
