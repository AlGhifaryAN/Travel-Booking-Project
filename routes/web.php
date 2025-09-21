<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\TravelScheduleController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Passenger\BookingController;
use App\Http\Controllers\Passenger\PaymentController;


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/unauthorized', function () {
    return "Akses ditolak!";
})->name('unauthorized');

Route::prefix('admin')->middleware(['auth', 'is_admin'])->name('admin.')->group(function () {
    Route::get('/', function () {
        return "Selamat datang Admin!";
    })->name('dashboard');

    Route::resource('travel-schedules', TravelScheduleController::class);

    Route::get('reports/passenger-count', [ReportController::class, 'passengerCount'])->name('reports.passenger_count');
    Route::get('reports/travel-history/{travelSchedule}', [ReportController::class, 'travelHistory'])->name('reports.travel_history');
});

Route::prefix('passenger')->middleware(['auth', 'is_passenger'])->name('passenger.')->group(function () {
    Route::get('/', function () {
        return "Selamat datang Penumpang!";
    })->name('dashboard');

    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

    Route::get('/bookings/history', [BookingController::class, 'history'])->name('bookings.history');

    Route::post('/bookings/{booking}/payment', [PaymentController::class, 'store'])->name('payments.store');

});
