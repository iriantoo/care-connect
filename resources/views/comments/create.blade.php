@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Komentar</h3>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('comments.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="forum_id" value="{{ $id_forum }}">
                        <div class="form-group mb-4">
                            <label for="content">Komentar</label>
                            <input type="text" class="form-control" id="content" name="content" required>
                        </div>
                        <div class="ms-auto d-flex justify-content-between">
                            <a href="{{ route('forums.show', $id_forum) }}" class="btn btn-danger">Batal</a>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection