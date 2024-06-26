@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">{{ $magazine->name }}</h1>
        <div class="mb-3">
            <p>{{ $magazine->description }}</p>
        </div>
        @if($magazine->image)
            <div class="mb-3">
                <img src="{{ asset('storage/' . $magazine->image) }}" alt="{{ $magazine->name }}" class="img-fluid" width="200">
            </div>
        @endif
        <div class="mb-3">
            <p><strong>User ID:</strong> {{ $magazine->user_id }}</p>
        </div>
        <div class="mb-3">
            <p><strong>Category ID:</strong> {{ $magazine->category_id }}</p>
        </div>
        <div class="d-flex">
            <a href="{{ route('magazines.edit', $magazine) }}" class="btn btn-outline-secondary me-2">Edit</a>
            <form action="{{ route('magazines.destroy', $magazine) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection
