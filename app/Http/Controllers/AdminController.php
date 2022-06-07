<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;



class AdminController extends Controller
{
    
    public function reset()
    {
        return view('admin.auth.reset');
    }
    public function dashboard(){
        return view('admin.dashboard.dashboard');
    }
}
