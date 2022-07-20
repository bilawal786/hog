<?php

namespace App\Http\Controllers\WebDriver\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DriverPaymentGetController extends Controller
{
    public function payment(){
        return view('admin.dashboard.driverPaymetget');
    }
}
