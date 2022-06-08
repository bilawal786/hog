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
        $users = SendMessage::where('status_assign', 'no')->whereNotNull('user_id')->count();
        $guests = SendMessage::where('status_assign', 'no')->where('user_id', null)->count();
        return response()->json([
            'users' => $users,
            'guests' => $guests,
        ]);
    }
    public function userCount(){
        $users = User::where('role', 'user')->count();
        $drivers = User::where('role', 'driver')->count();
        $admins = User::where('role', 'admin')->count();
        return response()->json([
            'users' => $users,
            'drivers' => $drivers,
            'admins' => $admins

        ]);
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
