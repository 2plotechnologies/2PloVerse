@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Edit Unit</h1>
        <form action="{{ route('units.update', $unit->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $unit->title }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Unit</button>
        </form>
    </div>
@endsection
