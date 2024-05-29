@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="fw-bold mb-3">{{ $forum->title }}</h2>
            <h3 class="mb-3">Oleh: {{ $forum->is_anonymous ? substr(strip_tags($forum->user->name), 0, 2) . "***": $forum->user->name }}</h3>
            <p>{{ $forum->description }}</p>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
            <div class="d-flex justify-content-between mb-2">
                <h3 class="fw-bold">Komentar</h3>
                <a href="{{ route('comments.create', $forum->id) }}" class="btn btn-dark">Tambahkan Komentar</a>
            </div>
            @foreach($comments as $comment)
                <div class="card mb-3">
                    <div class="card-body">
                        <h4 class="card-title fw-bold">{{ $comment->user->name }}</h4>
                        <p class="card-text">{{ $comment->content }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection