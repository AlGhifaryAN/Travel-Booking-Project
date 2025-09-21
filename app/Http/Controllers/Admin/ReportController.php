<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TravelSchedule;

class ReportController extends Controller
{
    public function passengersPerSchedule()
    {
        $schedules = TravelSchedule::with('bookings.passenger')->get();

        return view('admin.reports.passengers', compact('schedules'));
    }
}
