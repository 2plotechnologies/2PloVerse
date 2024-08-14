@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>{{ $lesson->title }}</h1>
    <p>{{ $lesson->content }}</p>
</div>
@endsection
