<?php

namespace App\Http\Controllers\Admin\GeneralSetting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\GeneralSetting;

class GeneralSettingController extends Controller
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
        $generaldata = GeneralSetting::find(1);
        return response()->json($generaldata);
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
        $header_file=$request->head_logo;
        $footer_file=$request->foot_logo;

        if(!empty($header_file)){
            $destinationPath = 'images/';
            $header_originalFile = $header_file->getClientOriginalName();
            $header_filename = strtotime("now").'-'.$header_originalFile;
            $header_file->move($destinationPath, $header_filename);
            $header_img = $destinationPath.$header_filename;
        }else{
            $header_img=null;
        }
        if(!empty($footer_file)){
            $destinationPath = 'images/';
            $footer_originalFile = $footer_file->getClientOriginalName();
            $footer_filename = strtotime("now").'-'.$footer_originalFile;
            $footer_file->move($destinationPath, $footer_filename);
            $footer_img = $destinationPath.$footer_filename;
        }else{
            $footer_img=null;
        }
        $generaldata = GeneralSetting::find(1);
        $generalupdatedata = GeneralSetting::where('id', 1)->update([
            'header_logo' => $header_img ?? $generaldata->header_logo,
            'footer_logo' => $footer_img ?? $generaldata->footer_logo,
            'email' => $request->email ?? $generaldata->email,
            'phone' => $request->phone ?? $generaldata->phone,
            'office_address' => $request->office_address ?? $generaldata->office_address,
            'mailing_address' => $request->mailing_address ?? $generaldata->mailing_address,
        ]);    
       
        return response()->json([
            "update" => "success"
        ]);
       // return redirect()->route('generalsetting');
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
}
