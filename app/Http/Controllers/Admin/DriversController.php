<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class DriversController extends Controller
{
    //
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function clients(){

    }
    public function drivers(){
        $drivers = User::where('role', 'driver')->orderBy('id', 'desc')->get();
        return view('admin.dashboard.drivers', compact('drivers'));
    }
    public function addDriver(Request $request){
        $validated = $request->validate([
            'driverName' => 'required|max:255',
            'driverEmail' => 'required|max:255',
            'driverPassword' => 'required|max:255',
            'driverPassword_confirm' => 'required_with:driverPassword|same:driverPassword',
            ]);
            $save_driver = new User;
            $save_driver->name = $request->driverName;
            $save_driver->email = $request->driverEmail;
            $save_driver->phone = $request->driverPhone;
            $save_driver->role = 'driver';
            $save_driver->address = $request->driverAddress;
            $save_driver->password = Hash::make($request->driverPassword);
            $save_driver->save();

            return redirect()->back();
    }
}
