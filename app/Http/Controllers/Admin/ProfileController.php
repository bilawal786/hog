<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
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
    public function profile()
    {
       
       // dd();
        return view('admin.dashboard.profile');
    }
    public function updateProfile(Request $request)
    {
       
        dd($request);
        return view('admin.dashboard.profile');
    }
}
