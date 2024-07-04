@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>{{ $magazinePost->title }}</h1>
        <p>{{ $magazinePost->content }}</p>
        <a href="{{ route('magazines.show', $magazinePost->magazine_id) }}" class="btn btn-outline-secondary">Back to Magazine</a>
    </div>
@endsection
