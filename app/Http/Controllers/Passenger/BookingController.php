<?php

namespace App\Http\Controllers\Passenger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\TravelSchedule;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $schedules = TravelSchedule::where('departure_date', '>=', now())
            ->whereColumn('quota', '>', 0)
            ->get();
        return view('passenger.bookings.index', compact('schedules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'travel_schedule_id' => 'required|exists:travel_schedules,id',
        ]);

        $schedule = TravelSchedule::findOrFail($request->travel_schedule_id);

        if ($schedule->quota <= 0) {
            return redirect()->back()->withErrors('Quota penuh, tidak bisa memesan.');
        }

        Booking::create([
            'passenger_id' => Auth::id(),
            'travel_schedule_id' => $schedule->id,
            'status' => 'pending',
        ]);

        // Kurangi quota
        $schedule->decrement('quota');

        return redirect()->route('passenger.bookings.index')->with('success','Booking berhasil.');
    }

    public function history()
    {
        $bookings = Booking::with('travelSchedule')->where('passenger_id', Auth::id())->get();
        return view('passenger.bookings.history', compact('bookings'));
    }
}
