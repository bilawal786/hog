<?php

namespace App\Http\Controllers\Admin\Lead;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DriverLeads;
use App\Http\Resources\DriverLeadsResources;
use Auth;

class DriverLeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $driverlead = DriverLeads::with('driver', 'leads')->where('driver_id', Auth::user()->id)->get();
        $data = DriverLeadsResources::collection($driverlead);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        
        $data = DriverLeads::where('id', $id)->update([
            "status"=> $request->status
        ]);

        return response()->json('success');
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
    public function allleads(){
        $assigned = DriverLeads::where('driver_id', Auth::user()->id)->where('status', 'Assigned')->count();
        $process = DriverLeads::where('driver_id', Auth::user()->id)->where('status', 'Process')->count();
        $reject = DriverLeads::where('driver_id', Auth::user()->id)->where('status', 'Reject')->count();
        $success = DriverLeads::where('driver_id', Auth::user()->id)->where('status', 'Complete')->count();
        return response()->json([$assigned, $process, $reject, $success]);
    }
}
