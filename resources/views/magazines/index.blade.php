@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Magazines</h1>
        <a href="{{ route('magazines.create') }}" class="btn btn-primary mb-3">Create New Magazine</a>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <ul class="list-group">
            @foreach($magazines as $magazine)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <a href="{{ route('magazines.show', $magazine) }}" class="text-decoration-none">{{ $magazine->name }}</a>
                    </div>
                    <div>
                        <a href="{{ route('magazines.edit', $magazine) }}" class="btn btn-sm btn-outline-secondary me-2">Edit</a>
                        <form action="{{ route('magazines.destroy', $magazine) }}" method="POST" class="d-inline">
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
