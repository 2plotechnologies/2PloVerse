@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Create New Unit</h1>
        <form action="{{ route('units.store') }}" method="POST">
            @csrf
            <input type="hidden" name="course_id" value="{{ $courseid }}">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Unit</button>
        </form>
    </div>
@endsection
