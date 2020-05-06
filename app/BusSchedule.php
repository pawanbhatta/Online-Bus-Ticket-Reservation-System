<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bus;

class BusSchedule extends Model
{
    protected $table = 'bus_schedules';
    protected $fillable = ['bus_id', 'depart_date', 'return_date', 'depart_time', 'return_time', 'pickup_address', 'dropoff_address', 'status'];
    protected $primaryKey = 'schedule_id';

    
    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
}