@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>{{ $chapter->title }}</h1>
    <div class="mb-3">
        <p>{{ $chapter->content }}</p>
    </div>
</div>
@endsection
