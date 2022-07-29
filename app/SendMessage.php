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
        'ridePerson',
        'else_first_name',
        'else_last_name',
        'familycaregive',
        'num_family_member',
        'pertaining',
        'appt_length',
        'card_on_file',
        'relative',
        'relative_no',
        'facility',
        'waiting',
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
        'distance',
        'start_address',
        'end_address',
        'cost',
        'user_id',
        'payment'
    ];
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
