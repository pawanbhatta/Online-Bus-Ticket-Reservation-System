<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    protected $table = 'operators';
    protected $fillable = ['operator_name', 'operator_email', 'operator_phone', 'operator_address', 'operator_logo', 'status'];
    protected $primaryKey = 'operator_id';

    // public function bus(){
    //     return $this->hasMany('App\Bus');
    // }
}