@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Course List</h1>
        <a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">Create New Course</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $course)
                    <tr>
                        <th scope="row">{{ $course->id }}</th>
                        <td>{{ $course->title }}</td>
                        <td>{{ $course->description }}</td>
                        <td>
                            <a href="{{ route('courses.show', $course) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('courses.edit', $course) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('courses.destroy', $course) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
