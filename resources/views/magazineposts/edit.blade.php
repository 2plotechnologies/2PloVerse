@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Edit Magazine Post</h1>
        <form action="{{ route('magazineposts.update', $magazinePost->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $magazinePost->title }}" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" rows="5" required>{{ $magazinePost->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Magazine Post</button>
        </form>
    </div>
@endsection
