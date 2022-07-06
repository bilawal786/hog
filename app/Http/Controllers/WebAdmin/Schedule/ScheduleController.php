<?php

namespace App\Http\Controllers\WebAdmin\Schedule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DriverLeads;
use Carbon\Carbon;
use App\Http\Resources\DriverScheduleResource;

class ScheduleController extends Controller
{
    public function viewCalender(){
        $today = DriverLeads::with('driver')->get()  ;
//        dd($today);
//        $data = DriverScheduleResource::collection($today);
//        dd($data);
        return view('admin.dashboard.driverSchedule', compact('today'));
    }
}
