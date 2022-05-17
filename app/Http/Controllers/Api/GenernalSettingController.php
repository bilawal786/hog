<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\GeneralSetting;

class GenernalSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allSetting = GeneralSetting::all();

        return response()->json([
            'status'=>true,
            'message'=>'user data',
            'data'=>  $allSetting[0]
        ]);

    }

}
