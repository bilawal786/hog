<?php

namespace App\Http\Controllers\WebAdmin\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DriverPaymentController extends Controller
{
    public function payment(){
        return view('admin.dashboard.driverPayment');
    }
}
