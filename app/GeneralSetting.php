<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    protected $fillable = [
        'header_logo',
        'footer_logo',
        'footer_about',
        'email',
        'phone',
        'office_address',
        'mailing_address',
    ];
}
