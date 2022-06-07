<?php

namespace App\Http\Controllers\Admin\Widgets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\SendMessage;
use App\DriverLeads;

class WidgetsController extends Controller
{
    public function unassigLeadCount(){
        
    }
    public function userCount(){
        
    }
    public function processCount(){

    }
    public function statusCount(){
        $assigned = DriverLeads::where('status', 'Assigned')->count();
        $process = DriverLeads::where('status', 'Process')->count();
        $reject = DriverLeads::where('status', 'Reject')->count();
        $success = DriverLeads::where('status', 'Complete')->count();
        return response()->json([$assigned, $process, $reject, $success]);
    }
}
