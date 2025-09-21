@extends('layouts.admin')

@section('title', 'Daftar Travel Schedule')

@section('content')
<div class="container">
    <h2>Daftar Travel Schedule</h2>

    <a href="{{ route('admin.travel-schedules.create') }}" class="btn btn-success mb-3">Tambah Schedule</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tujuan</th>
                <th>Tanggal Keberangkatan</th>
                <th>Waktu</th>
                <th>Quota</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($schedules as $schedule)
            <tr>
                <td>{{ $schedule->id }}</td>
                <td>{{ $schedule->destination }}</td>
                <td>{{ $schedule->departure_date }}</td>
                <td>{{ $schedule->departure_time }}</td>
                <td>{{ $schedule->quota }}</td>
                <td>{{ $schedule->price }}</td>
                <td>
                    <a href="{{ route('admin.travel-schedules.edit', $schedule->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('admin.travel-schedules.destroy', $schedule->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
