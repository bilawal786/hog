<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SendMessage extends Model
{
    protected $fillable = [
        'Fname',
        'Lname',
        'email',
        'phone',
        'message',
        'account',
        'invice',
        'wheelchair',
        'round_trip',
        'trip_date',
        'start_lat',
        'start_lng',
        'end_lat',
        'end_lng',
        'cost',
    ];
}
