@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Storys</h1>
        <a href="{{ route('histories.create') }}" class="btn btn-primary mb-3">Create New Story</a>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <ul class="list-group">
            @foreach($histories as $history)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <a href="{{ route('histories.show', $history) }}" class="text-decoration-none">{{ $history->name }}</a>
                    </div>
                    <div>
                        <a href="{{ route('histories.edit', $history) }}" class="btn btn-sm btn-outline-secondary me-2">Edit</a>
                        <form action="{{ route('histories.destroy', $history) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
