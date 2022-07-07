<?php

namespace App\Http\Controllers\Api;

use App\SendMessage;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class GetMessageController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getBillingQuestionsById(){
        $getQuestion = SendMessage::where('type', 'Billing Question')->where('user_id', Auth::user()->id)->get();
        return response()->json([
            'type' => "Billing Question",
            'data' => $getQuestion,
        ]);
    }
    public function getRequestRidesByid(){
        $getQuestion = SendMessage::with('user')->where('type', 'Request Ride')->where('payment', 'yes')->where('user_id', Auth::user()->id)->get();
        return response()->json([
            'type' => "Request Ride",
            'data' => $getQuestion,
        ]);
    }
    public function getSubmitFeedBacksByid(){
        $getQuestion = SendMessage::where('type', 'Submit Feedback')->where('user_id', Auth::user()->id)->get();
        return response()->json([
            'type' => "Submit Feedback",
            'data' => $getQuestion,
        ]);
    }
    public function getContactOthersByid(){
        $getQuestion = SendMessage::where('type', 'Others')->where('user_id', Auth::user()->id)->get();
        return response()->json([
            'type' => "Others",
            'data' => $getQuestion,
        ]);
    }
}
