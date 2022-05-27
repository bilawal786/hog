<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\SendMessage;

class FormSubmitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function submit_feedBack()
    {
        //
        $feedBacks = SendMessage::where('type', 'Submit Feedback')->get();
        return view('admin.dashboard.submit_feedback', compact('feedBacks'));
    }
    public function billing_question()
    {
        //
        $questions = SendMessage::where('type', 'Billing Question')->get();
        return view('admin.dashboard.billing_question', compact('questions'));
    }
    public function request_ride()
    {
        //
        $rides = SendMessage::where('type', 'Request Ride')->get();
        return view('admin.dashboard.request_ride', compact('rides'));
    }
    public function other()
    {
        //
        $others = SendMessage::where('type', 'Others')->get();
        return view('admin.dashboard.other', compact('others'));
    }

}
