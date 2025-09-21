@extends('layouts.app')

@section('title', 'Booking Travel Schedule')

@section('content')
<div style="max-width: 600px; margin: 20px auto;">
    <h2>Booking Travel Schedule</h2>

    <form action="{{ route('passenger.bookings.store') }}" method="POST">
        @csrf
        <input type="hidden" name="travel_schedule_id" value="{{ request('travel_schedule_id') }}">

        <p>Apakah Anda yakin ingin booking jadwal ini?</p>

        <button type="submit" style="padding:10px 15px; background:#28a745; color:white; border:none; border-radius:4px;">Booking Sekarang</button>
    </form>
</div>
@endsection
