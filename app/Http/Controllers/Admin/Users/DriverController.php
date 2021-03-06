<?php

namespace App\Http\Controllers\Admin\Users;

use App\GeneralSetting;
use App\Http\Controllers\Controller;
use App\Mail\CreateDriver;
use App\Mail\RequestRide;
use Illuminate\Http\Request;
//use Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\DriverResource;
use App\User;
use Auth;
use Illuminate\Support\Facades\Mail;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $search = request()->search;
        $limit = request()->limit;
        $drivers = User::where('role', 'driver')
            ->where(
                function($query) use ($search) {
                    $query
                        ->where('first_name','like','%'.$search.'%')
                        ->orwhere('last_name','like','%'.$search.'%')
                        ->orwhere('email','like','%'.$search.'%')
                        ->orwhere('phone','like','%'.$search.'%')
                        ->orwhere('address','like','%'.$search.'%');
                })
            ->orderBy('id', 'desc')
            ->paginate($limit);
        return response()->json($drivers);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $adminmail = GeneralSetting::find(1)->email;
        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|max:255|email|unique:users',
            'password' => 'required|max:255',
            'comfirm_password' => 'required_with:password|same:password',
            ]);
            $save_driver = new User;
            $save_driver->first_name = $request->first_name;
            $save_driver->last_name = $request->last_name;
            $save_driver->email = $request->email;
            $save_driver->phone = $request->phone;
            $save_driver->role = 'driver';
            $save_driver->address = $request->address;
            $save_driver->city = $request->city;
            $save_driver->password = Hash::make($request->password);
            $save_driver->save();
            Mail::to($save_driver->email)
                ->cc($adminmail)
                ->send(new CreateDriver($save_driver));

        $notification = array(
            'messege' => 'Drive successfully Created!',
            'type' => 'success'
        );
           return response()->json($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $driver = User::where('role', 'driver')->where('id', $id)->first();
        return response()->json($driver);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'password' => 'required|max:255',
            'comfirm_password' => 'required_with:password|same:password',
        ]);
        $data = User::where('id', $id)->first();

        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->city = $request->city;
        if ($request->password){
            $data->password = Hash::make($request->password);
        }
        $data->update();
        $notification = array(
            'messege' => 'Drive successfully Update!',
            'type' => 'success'
        );
        return response()->json($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        $notification = array(
            'messege' => 'Driver Delete successfully',
            'type' => 'success'
        );
        return response()->json($notification);
    }
    public function getAllDrivers(){
        $drivers = User::where('role', 'driver')->select('id', 'first_name', 'last_name')->orderBy('id', 'desc')->get();
        $data = DriverResource::collection($drivers);
        return response()->json($data);
    }
    public function block($id){
        User::Where('id', $id)->update(['status' => '0']);
        $notification = array(
            'messege' => 'Driver Block successfully!',
            'type' => 'success'
        );
        return response()->json($notification);
    }
    public function unblock($id){
        User::Where('id', $id)->update(['status' => '1']);
        $notification = array(
            'messege' => 'Driver Unblock successfully!',
            'type' => 'success'
        );
        return response()->json($notification);
    }
}
