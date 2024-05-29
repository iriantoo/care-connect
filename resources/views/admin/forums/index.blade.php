@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Forum</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th width="200">Judul</th>
                            <th width="200">Deskripsi</th>
                            <th>Tanggal Kejadian</th>
                            <th>Waktu Kejadian</th>
                            <th>Status</th>
                            <th>Status Anonim</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($forums as $forum)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $forum->title }}</td>
                            <td>{{ substr(strip_tags($forum->description), 0, 50) }} ...</td>
                            <td>{{ $forum->date_of_incident }}</td>
                            <td>{{ $forum->time_of_incident }}</td>
                            <td>{{ $forum->is_confirmed ? 'Terkonfirmasi' : 'Belum terkonfirmasi' }}</td>
                            <td>{{ $forum->is_anonymous ? 'Anonim' : 'Tidak Anonim' }}</td>
                            <td>
                                @if (!$forum->is_confirmed)
                                    <form action="{{ route('forums.adminConfirm') }}" method="POST" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="forum_id" value="{{ $forum->id }}">
                                        <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah Anda yakin ingin mengkonfirmasi forum ini?')">Konfirmasi</button>
                                    </form>
                                @endif
                                <form action="{{ route('forums.destroy', $forum->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus forum ini?')"><i class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $forums->links() }}
            </div>
        </div>
    </div>
</div>

@endsection