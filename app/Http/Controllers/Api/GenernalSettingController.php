<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\GeneralSetting;

class GenernalSettingController extends Controller
{
    //
    public function index(){
        $settingData =  GeneralSetting::first();
        
        return response()->json([
             $settingData
            ]);
    }
}
