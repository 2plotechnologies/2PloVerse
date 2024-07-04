@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Create New Magazine Post</h1>
        <form action="{{ route('magazineposts.store') }}" method="POST">
            @csrf
            <input type="hidden" name="magazine_id" value="{{ $magazineId }}">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create Magazine Post</button>
        </form>
    </div>
@endsection
