<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $fillable = ['customer_id', 'bus_id','seats_booked', 'total_price', 'status'];
    protected $primaryKey = 'booking_id';
}