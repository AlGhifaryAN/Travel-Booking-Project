@extends('layouts.app')

@section('title', 'Riwayat Booking')

@section('content')
<div class="container my-4" style="max-width: 800px;">
    <h2>Riwayat Booking</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($bookings->isEmpty())
        <p>Belum ada riwayat booking.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Booking</th>
                    <th>Tujuan</th>
                    <th>Tanggal Keberangkatan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->schedule->destination }}</td>
                    <td>{{ $booking->schedule->departure_date }}</td>
                    <td>
                        @if($booking->status === 'pending')
                            <span class="badge bg-warning">Pending</span>
                        @elseif($booking->status === 'paid')
                            <span class="badge bg-success">Paid</span>
                        @else
                            <span class="badge bg-secondary">{{ $booking->status }}</span>
                        @endif
                    </td>
                    <td>
                        @if($booking->status === 'pending')
                            <a href="{{ route('passenger.payments.show', $booking->id) }}" class="btn btn-primary btn-sm">Bayar</a>
                        @else
                            <span class="text-muted">Tidak ada aksi</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
