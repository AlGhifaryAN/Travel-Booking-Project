@extends('layouts.app')

@section('title', 'Pembayaran Booking')

@section('content')
<div class="container my-4" style="max-width: 600px;">
    <h2>Pembayaran Booking</h2>

    <div class="card p-3">
        <p><strong>Tujuan:</strong> {{ $booking->schedule->destination }}</p>
        <p><strong>Tanggal:</strong> {{ $booking->schedule->departure_date }}</p>
        <p><strong>Harga:</strong> {{ $booking->schedule->price }}</p>

        <form action="{{ route('passenger.payments.store', $booking->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="amount" class="form-label">Jumlah Pembayaran</label>
                <input type="number" name="amount" id="amount" value="{{ $booking->schedule->price }}" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Bayar Sekarang</button>
        </form>
    </div>
</div>
@endsection
