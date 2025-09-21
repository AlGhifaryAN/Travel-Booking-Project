<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','travel_schedule_id','seats','status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'passenger_id');
    }

    public function schedule()
    {
        return $this->belongsTo(TravelSchedule::class,'travel_schedule_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
