@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>{{ $magazinePost->title }}</h1>
    <div class="mb-3">
        <p>{{ $magazinePost->content }}</p>
    </div>
</div>
@endsection
