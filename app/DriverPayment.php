<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverPayment extends Model
{
    protected $fillable = [
        'driver_id',
        'payment',
        'status',
    ];
    public function driver(){
        return $this->belongsTo('App\User', 'driver_id', 'id');
    }
}

