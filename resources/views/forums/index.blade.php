@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="fw-bold">Forums</h1>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col">
            <a href="{{ route('forums.create') }}" class="btn btn-dark">Buat Laporan</a>
        </div>
    </div>
    @foreach($forums as $forum)
        @if ($loop->iteration % 2 == 1)
            <div class="row mb-3">
        @endif
                <div class="col-6">
                    <div class="card shadow bg-secondary-subtle" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-8">
                                <div class="card-body">                                  
                                    <h5 class="fw-semibold">{{ $forum->title }}</h5>
                                    <p class="card-text">{{ substr(strip_tags($forum->description), 0, 50) }} ...</p>
                                    <p class="card-text"><small class="text-body-secondary">{{ $forum->date_of_incident }} {{ $forum->time_of_incident	 }}</small></p>
                                    <p><span class="fst-italic">{{ $forum->is_confirmed ? 'Terkonfirmasi' : 'Belum terkonfirmasi' }}</span></p>
                                    <a href="{{ route('forums.show', $forum->id) }}" class="btn btn-dark">Detail Forum</a>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex">
                                @if ($forum->picture)
                                    <img src="{{ asset('img/forum/' . $forum->picture) }}" height="150" class="card-img-top" alt="..." />
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
        @if ($loop->iteration % 2 == 0)
            </div>
        @endif
    @endforeach
</div>
@endsection