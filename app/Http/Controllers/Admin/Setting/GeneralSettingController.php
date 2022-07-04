<?php

namespace App\Http\Controllers\Admin\Setting;

use App\GeneralSetting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{
    public function generalsetting()
    {

        $generaldata = GeneralSetting::find(1);
        // return response()->json($generaldata);
        return view('admin.dashboard.generalsetting', compact('generaldata'));
    }
    public function updategeneralsetting(Request $request)
    {
        $header_file=$request->header_logo;
        $footer_file=$request->footer_logo;

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

        return redirect()->route('generalsetting');
    }
}
