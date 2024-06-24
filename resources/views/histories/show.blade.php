@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">{{ $history->name }}</h1>
        <div class="mb-3">
            <p>{{ $history->description }}</p>
        </div>
        @if($history->image)
            <div class="mb-3">
                <img src="{{ asset('storage/' . $history->image) }}" alt="{{ $history->name }}" class="img-fluid" width="200">
            </div>
        @endif
        <div class="mb-3">
            <p><strong>User ID:</strong> {{ $history->user_id }}</p>
        </div>
        <div class="mb-3">
            <p><strong>Category ID:</strong> {{ $history->category_id }}</p>
        </div>
        <div class="d-flex">
            <a href="{{ route('histories.edit', $history) }}" class="btn btn-outline-secondary me-2">Edit</a>
            <form action="{{ route('histories.destroy', $history) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection
