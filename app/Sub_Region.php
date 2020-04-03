<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_Region extends Model
{
    protected $table = 'sub_regions';
    protected $fillable = ['sub_region_name', 'region_id', 'sub_region_code', 'status'];
    protected $primaryKey = 'sub_region_id';
}