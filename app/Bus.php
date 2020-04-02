<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $table = 'buses';
    protected $fillable = ['bus_name', 'bus_code', 'operator_id', 'total_seats', 'status'];
    protected $primaryKey = 'bus_id';

    // public function operator(){
    //     return $this->belongsTo('App\Operator', 'operator_id');
    // }
}