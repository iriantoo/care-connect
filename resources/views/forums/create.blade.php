@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Buat Laporan</h3>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('forums.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group mb-4">
                            <label for="title">Judul</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="description">Deskripsi</label>
                            <textarea name="description" id="description" class="form-control" required></textarea>
                        </div>
                        <div class="row mb-4">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="date_of_incident">Tanggal Kejadian</label>
                                    <input type="date" class="form-control" id="date_of_incident" name="date_of_incident" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="time_of_incident">Waktu Kejadian</label>
                                    <input type="time" class="form-control" id="time_of_incident" name="time_of_incident" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="name">Gambar Kejadian <small>Jika ada</small></label>
                            <input type="file" class="form-control" id="picture" name="picture">
                        </div>
                        <div class="form-check mb-4">
                            <label for="is_anonymous" class="form-check-label">Sembunyikan Nama</label>
                            <input type="checkbox" class="form-check-input" id="is_anonymous" name="is_anonymous">
                        </div>
                        <div class="ms-auto d-flex justify-content-between">
                            <a href="{{ route('forums.index') }}" class="btn btn-danger">Batal</a>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection