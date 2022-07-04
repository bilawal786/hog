<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverLeads extends Model
{
    protected $fillable = [
        'driver_id',
        'ride_id',
        'cost',
        'start_date',
        'end_date',
        'notes',
        'status',
    ];
    public function driver(){
        return $this->belongsTo('App\User', 'driver_id', 'id');
    }
    public function leads(){
        return $this->belongsTo('App\SendMessage', 'ride_id', 'id');
    }
}
