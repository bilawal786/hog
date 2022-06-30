<?php

namespace App\Http\Controllers\Admin\DriverPayment;


use App\AdminAprovePayment;
use App\DriverPayment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DriverPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DriverPayment::with('driver')->orderBy('id', 'desc')->paginate(10);
        return response()->json($data);
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
        $validated = $request->validate([
            'driver_id' => 'required|max:255',
            'ride_id' => 'required|max:255',
            'payment' => 'required|max:255',
        ]);
        $data = new DriverPayment;
        $data->driver_id = $request->driver_id;
        $data->ride_id = $request->ride_id;
        $data->payment = $request->payment;
        $data->status = '0';
        $data->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DriverPayment::where('id', $id)->first();
        return response()->json($data);
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
        DriverPayment::where('driver_id', $id)->where('status', '0')->update(['status' => '1']);
        $notification = array(
            'messege' => 'With Draw successfully!',
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
        //
    }
    public function driverpayment(){
        $data = DriverPayment::where('driver_id', Auth::user()->id)->where('status', '0')->sum('payment');
        return response()->json([
            'total' => $data,
            'driver_id' => Auth::user()->id
        ]);
    }
    public function adminPaymentlist(){
        $data =AdminAprovePayment::with('driver')->orderBy('id', 'desc')->paginate(10);
        return response()->json($data);
    }
}
