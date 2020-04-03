<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusSchedule extends Model
{
    protected $table = 'bus_schedules';
    protected $fillable = ['bus_id', 'operator_id', 'region_id', 'sub_region_id', 'depart_date', 'return_date', 'depart_time', 'return_time', 'pickup_address', 'dropoff_address', 'status'];
    protected $primaryKey = 'schedule_id';
}