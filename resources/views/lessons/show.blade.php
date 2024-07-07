@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>{{ $lesson->title }}</h1>
        <p>{{ $lesson->content }}</p>
        <a href="{{ route('units.show', $lesson->unit_id) }}" class="btn btn-outline-secondary">Back to Unit</a>
    </div>
@endsection
