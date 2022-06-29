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
        $driverlead = DriverLeads::with('driver', 'leads')->where('id', $id)->first();
        return  response()->json($driverlead);
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
        switch ($request->status) {
            case 'assign':
                $data = DriverLeads::where('id', $id)->update([
                    "status"=> $request->status,
                    'assign' => $request->assign
                ]);
                return response()->json('success');
              break;
            case 'process':
                $data = DriverLeads::where('id', $id)->update([
                    "status"=> $request->status,
                    'process' => $request->process
                ]);
                return response()->json('success');
              break;
            case 'reject':
                $data = DriverLeads::where('id', $id)->update([
                    "status"=> $request->status,
                    'reject' => $request->reject
                ]);
                return response()->json('success');
              break;
            case 'complete':
                $data = DriverLeads::where('id', $id)->update([
                    "status"=> $request->status,
                    'complete' => $request->complete
                ]);
                return response()->json('success');
            default:

          }
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
        $assigned = DriverLeads::where('driver_id', Auth::user()->id)
            ->where('status', 'assign')
            ->where('assign', 'yes')
            ->where('process', 'no')
            ->where('reject', 'no')
            ->where('complete', 'no')
            ->count();
        $process = DriverLeads::where('driver_id', Auth::user()->id)
            ->where('status', 'Process')
            ->where('assign', 'yes')
            ->where('process', 'yes')
            ->where('reject', 'no')
            ->where('complete', 'no')
            ->count();
        $reject = DriverLeads::where('driver_id', Auth::user()->id)
            ->where('status', 'reject')
            ->where('assign', 'yes')
            ->where('process', 'no')
            ->where('reject', 'yes')
            ->where('complete', 'no')
            ->count();
        $success = DriverLeads::where('driver_id', Auth::user()->id)
            ->where('status', 'complete')
            ->where('assign', 'yes')
            ->where('process', 'yes')
            ->where('reject', 'no')
            ->where('complete', 'yes')
            ->count();
        return response()->json([$assigned, $process, $reject, $success]);
    }
    public function allDriverLeads(){
        $data = DriverLeads::where('driver_id', Auth::user()->id)->where('status', '0')->paginate(10);
        return response()->json($data);
    }
}
