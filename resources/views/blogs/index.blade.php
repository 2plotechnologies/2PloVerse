@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Blogs</h1>
        <a href="{{ route('blogs.create') }}" class="btn btn-primary mb-3">Create New Blog</a>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <ul class="list-group">
            @foreach($blogs as $blog)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <a href="{{ route('blogs.show', $blog) }}" class="text-decoration-none">{{ $blog->name }}</a>
                    </div>
                    <div>
                        <a href="{{ route('blogs.edit', $blog) }}" class="btn btn-sm btn-outline-secondary me-2">Edit</a>
                        <form action="{{ route('blogs.destroy', $blog) }}" method="POST" class="d-inline">
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
