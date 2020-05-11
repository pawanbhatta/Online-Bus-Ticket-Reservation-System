<?php

namespace App;
use App\Bus;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $fillable = ['customer_id', 'bus_id', 'schedule_id', 'seats_booked', 'total_price', 'status', 'source', 'destination'];
    protected $primaryKey = 'booking_id';

    protected $casts = [
        'seats_booked'  =>  'array',
    ];

    public function schedule()
    {
        return $this->belongsTo(App\BusSchedule::class);
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
}