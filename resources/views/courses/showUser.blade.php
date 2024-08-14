@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>{{ $course->name }}</h1>
    <p>{{ $course->description }}</p>

    @if($course->image)
        <div class="mb-3">
            <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->name }}" class="img-fluid" width="200">
        </div>
    @endif

    <h2>Units</h2>
    @foreach($course->units as $unit)
        <div class="mb-3">
            <h3>{{ $unit->title }}</h3>
            <ul>
                @foreach($unit->lessons as $lesson)
                    <li>
                        <a href="{{ route('lessons.showUser', $lesson->id) }}">{{ $lesson->title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach

</div>
@endsection
