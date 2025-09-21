<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination','departure_date','departure_time','quota','price','description'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function bookedCount()
    {
        return $this->bookings()->count();
    }

    public function remainingQuota()
    {
        return $this->quota - $this->bookedCount();
    }
}
