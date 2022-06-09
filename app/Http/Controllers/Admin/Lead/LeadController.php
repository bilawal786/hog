<?php

namespace App\Http\Controllers\Admin\Lead;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\DriverLeads;

class LeadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 
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
        $validated = $request->validate([
            'driver_id' => 'required',
            'ride_id' => 'required',
            'notes' => 'required',
            'status' => 'required',
            ]);
            $driver_lead = new DriverLeads;
            $driver_lead->driver_id = $request->driver_id;
            $driver_lead->ride_id = $request->ride_id;
            $driver_lead->notes = $request->notes;
            $driver_lead->status = $request->status;
            $driver_lead->assign = $request->assign;
            $driver_lead->process = $request->process;
            $driver_lead->reject = $request->reject;
            $driver_lead->complete = $request->complete;
            $driver_lead->save();

           return response()->json([
               "driver" => "Successfully Created"
           ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $leadallassign = DriverLeads::where('ride_id', $id)->get();
        $lead = DriverLeads::where('ride_id', $id)->orderBy('id', 'desc')->first();

        if($lead){
            return response()->json($lead);
        }else{
            return response()->json('no');
        }

       
        // return response()->json($data, 200, $headers);
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
    public function leadsassign(){
        $lead = DriverLeads::where('status', 'assign')
                ->where('assign', 'yes')
                ->where('process', 'no')
                ->where('reject', 'no')
                ->where('complete', 'no')
                ->with('driver')
                ->with('leads')
                ->orderBy('id', 'desc')
                ->get();
        return response()->json($lead);
    }
    public function leadsprocess(){
        $lead = DriverLeads::where('status', 'process')
                ->where('assign', 'yes')
                ->where('process', 'yes')
                ->where('reject', 'no')
                ->where('complete', 'no')
                ->with('driver')
                ->with('leads')
                ->orderBy('id', 'desc')
                ->get();
        return response()->json($lead);
    }
    public function leadcomplete(){
        $lead = DriverLeads::where('status', 'complete')
                ->where('assign', 'yes')
                ->where('process', 'yes')
                ->where('reject', 'no')
                ->where('complete', 'yes')
                ->with('driver')
                ->with('leads')
                ->orderBy('id', 'desc')
                ->get();
        return response()->json($lead);
    }
    public function leadsreject(){
        $lead = DriverLeads::where('status', 'reject')
                ->where('assign', 'yes')
                ->where('process', 'no')
                ->where('reject', 'yes')
                ->where('complete', 'no')
                ->with('driver')
                ->with('leads')
                ->orderBy('id', 'desc')
                ->get();
        return response()->json($lead);
    }
}
