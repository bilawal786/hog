<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GeneralSetting;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard.dashboard');
    }
    public function generalsetting()
    {
        $generaldata = GeneralSetting::find(1);
       
        return view('admin.dashboard.generalsetting',  compact('generaldata'));
    }
    public function updategeneralsetting(Request $request)
    {
       
        $generaldata = GeneralSetting::where('id', 1)->update([
            'header_logo' => $request->header_logo,
            'footer_logo' => $request->footer_logo,
            'email' => $request->email,
            'phone' => $request->phone,
            'office_address' => $request->office_address,
            'mailing_address' => $request->mailing_address,
        ]);
       
       
        return redirect()->route('generalsetting');
    }
    public function profile()
    {
       // dd();
        return view('admin.dashboard.profile');
    }
}
