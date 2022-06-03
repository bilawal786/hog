<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverLeads extends Model
{
    protected $fillable = [
        'driver_id',
        'ride_id',
        'notes',
        'status',
    ];
}
