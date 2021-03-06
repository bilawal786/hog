<?php

namespace App\Http\Controllers\WebAdmin\Schedule;

use App\Http\Controllers\Controller;
use App\SendMessage;
use Illuminate\Http\Request;
use App\DriverLeads;
use Carbon\Carbon;
use App\Http\Resources\DriverScheduleResource;

class ScheduleController extends Controller
{
    public function viewCalender(){
        $today = DriverLeads::with('driver')->get();
        $rides = SendMessage::with('user')->get();
//        dd($today);
//        $data = DriverScheduleResource::collection($today);
//        dd($data);
        return view('admin.dashboard.driverSchedule', compact('today', 'rides'));
    }
}
