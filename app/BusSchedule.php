<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bus;

class BusSchedule extends Model
{
    protected $table = 'bus_schedules';
    protected $fillable = ['bus_id', 'depart_date', 'return_date', 'depart_time', 'return_time', 'pickup_address', 'dropoff_address', 'stations', 'price', 'status'];
    protected $primaryKey = 'schedule_id';

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

    public function stations()
    {
        return $this->hasMany(App\Station::class);
    }
    
    public function bookings()
    {
        return $this->belongsTo(App\Booking::class);
    }

    protected $casts = [
        'stations'  =>  'array'
    ];
}