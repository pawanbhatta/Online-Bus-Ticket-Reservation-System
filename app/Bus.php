<?php

namespace App;
use App\BusSchedule;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $table = 'buses';
    protected $fillable = ['bus_name', 'bus_num', 'phone', 'pickup_address', 'dropoff_address', 'seats_avail', 'seats_booked', 'depart_time', 'depart_date', 'bus_image', 'total_seats', 'status'];
    protected $primaryKey = 'bus_id';

    public function schedules()
    {
        return $this->hasMany(BusSchedule::class);
    }
}