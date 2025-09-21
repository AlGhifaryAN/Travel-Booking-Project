<?php

namespace App\Http\Controllers\Passenger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function store(Request $request, Booking $booking)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
        ]);

        Payment::create([
            'booking_id' => $booking->id,
            'amount' => $request->amount,
            'status' => 'confirmed',
        ]);

        $booking->update(['status' => 'paid']);

        return redirect()->route('passenger.bookings.history')->with('success','Pembayaran berhasil.');
    }
}
