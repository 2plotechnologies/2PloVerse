@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>{{ $blogPost->title }}</h1>
    <div class="mb-3">
        <p>{{ $blogPost->content }}</p>
    </div>
</div>
@endsection
