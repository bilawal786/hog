<?php

namespace App\Http\Controllers\Admin\Form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\SendMessage;

class RequestRideController extends Controller
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
        $rides = SendMessage::where('type', 'Request Ride')->where('payment', 'yes')->orderBy('id', 'desc')->paginate(10);
        return response()->json($rides);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ride = SendMessage::where('type', 'Request Ride')->where('id', $id)->first();
        return response()->json($ride);
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
        //
    try {
        $validated = $request->validate([
            'type' => 'required|max:255',
            'Fname' => 'required|max:255',
            'Lname' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|max:255',
            'wheelchair' => 'required',
            'round_trip' => 'required',
            'trip_date' => 'required',
            'start_lat' => 'required|max:255',
            'start_lng' => 'required|max:255',
            'end_lat' => 'required|max:255',
            'end_lng' => 'required|max:255',
            'start_address' => 'required|max:255',
            'end_address' => 'required|max:255',
            'cost' => 'required|max:255',
            'status_assign' => 'required|max:255',
            ]);
        }
        catch (ValidationException $exception) {
            return response()->json([
                'status' => 'error',
                'msg'    => 'Error',
                'errors' => $exception->errors(),
            ], 422);
        }
       SendMessage::where('id', $id)->update([

        'Fname' => $request->Fname,
        'Lname' => $request->Lname,
        'email' => $request->email,
           'phone' => $request->phone,
           'card_on_file' => $request->card_on_file,
           'relative' => $request->relative,
           'relative_no' => $request->relative_no,
           'facility' => $request->facility,
           'waiting' => $request->waiting,
        'wheelchair' => $request->wheelchair,
        'round_trip' => $request->round_trip,
        'trip_date' => $request->trip_date,
        'start_lat' => $request->start_lat,
        'start_lng' => $request->start_lng,
        'end_lat' => $request->end_lat,
        'end_lng' => $request->end_lng,
        'distance' => $this->distance($request->start_lat, $request->start_lng, $request->end_lat, $request->end_lng, 'K'),
        'start_address' => $request->start_address,
        'end_address' => $request->end_address,
        'cost' => $request->cost,
        'message' => $request->message,
       ]);
        $notification = array(
            'messege' => 'Request Ride successfully Updated!',
            'type' => 'success'
        );
        return response()->json($notification);
    }
    public function distance($lat1, $lon1, $lat2, $lon2, $unit) {
        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
          return 0;
        }
        else {
          $theta = $lon1 - $lon2;
          $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
          $dist = acos($dist);
          $dist = rad2deg($dist);
          $miles = $dist * 60 * 1.1515;
            return $miles;

        }
      }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SendMessage::where('id', $id)->delete();
        $notification = array(
            'messege' => 'Request Ride Delete successfully',
            'type' => 'success'
        );
        return response()->json($notification);
    }
    public function unassignRide()
    {
        $rides = SendMessage::where('type', 'Request Ride')->where('status_assign', 'no')->where('payment', 'yes')->orderBy('id', 'desc')->paginate(10);
        return response()->json($rides);
    }
    public function statusUpdate(Request $request, $id)
    {
        //
       SendMessage::where('id', $id)->update([
           'status_assign' => $request->status_assign
       ]);
        return response()->json([
            'assign' => $request->status_assign
        ]);
    }
}
