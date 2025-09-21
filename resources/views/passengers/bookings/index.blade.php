@extends('layouts.app')

@section('title', 'Daftar Travel Schedule')

@section('content')
<div class="container my-4" style="max-width: 800px;">
    <h2>Daftar Travel Schedule</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
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
                    <form action="{{ route('passenger.bookings.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="travel_schedule_id" value="{{ $schedule->id }}">
                        <button type="submit" class="btn btn-success btn-sm" {{ $schedule->quota <= 0 ? 'disabled' : '' }}>
                            Booking
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
