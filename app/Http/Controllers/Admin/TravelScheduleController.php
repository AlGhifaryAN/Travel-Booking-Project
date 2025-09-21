<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TravelSchedule;

class TravelScheduleController extends Controller
{
    public function index()
    {
        $schedules = TravelSchedule::all();
        return view('admin.travel_schedules.index', compact('schedules'));
    }

    public function create()
    {
        return view('admin.travel_schedules.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'destination' => 'required|string|max:150',
            'departure_date' => 'required|date',
            'departure_time' => 'required',
            'quota' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        TravelSchedule::create($request->all());
        return redirect()->route('travel-schedules.index')->with('success','Schedule created.');
    }

    public function edit(TravelSchedule $travelSchedule)
    {
        return view('admin.travel_schedules.edit', compact('travelSchedule'));
    }

    public function update(Request $request, TravelSchedule $travelSchedule)
    {
        $request->validate([
            'destination' => 'required|string|max:150',
            'departure_date' => 'required|date',
            'departure_time' => 'required',
            'quota' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        $travelSchedule->update($request->all());
        return redirect()->route('travel-schedules.index')->with('success','Schedule updated.');
    }

    public function show($id)
    {
        $schedule = TravelSchedule::with('bookings.user')->findOrFail($id);
        $bookedCount = $schedule->bookedCount();
        $remaining = $schedule->remainingQuota();
        
        return view('admin.travel_schedules.show', compact('schedule','bookedCount','remaining'));
    }


    public function destroy(TravelSchedule $travelSchedule)
    {
        $travelSchedule->delete();
        return redirect()->route('travel-schedules.index')->with('success','Schedule deleted.');
    }
}
