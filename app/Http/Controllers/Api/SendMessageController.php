<?php

namespace App\Http\Controllers\Api;

use App\SendMessage;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SendMessageController extends Controller
{
     /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

     use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function sendMessage(Request $request){
        
        $validated = $request->validate([
            'type' => 'required|max:255',
            'Fname' => 'required|max:255',
            'Lname' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|max:255',
            'message' => 'required|max:255',
        ]);
        switch ($request->type) {
            case "Submit Feedback":
                $send_message = new SendMessage;
                $send_message->type = $request->type;
                $send_message->Fname = $request->Fname;
                $send_message->Lname = $request->Lname;
                $send_message->email = $request->email;
                $send_message->phone = $request->phone;
                $send_message->account = $request->account;
                $send_message->message = $request->message;
                $send_message->save();
                return response()->json([
                    'type' => "Submit Feedback"
                ]);

              break;
            case "Billing Question":
                $send_message = new SendMessage;
                $send_message->type = $request->type;
                $send_message->Fname = $request->Fname;
                $send_message->Lname = $request->Lname;
                $send_message->email = $request->email;
                $send_message->phone = $request->phone;
                $send_message->account = $request->account;
                $send_message->invice = $request->invoice;
                $send_message->message = $request->message;
                $send_message->save();
                return response()->json([
                    'type' => "Billing Question"
                ]);
             
              break;
            case "Request Ride":
                $send_message = new SendMessage;
                $send_message->type = $request->type;
                $send_message->Fname = $request->Fname;
                $send_message->Lname = $request->Lname;
                $send_message->email = $request->email;
                $send_message->phone = $request->phone;
                $send_message->wheelchair = $request->wheelChair;
                $send_message->round_trip = $request->roundTrip;
                $send_message->trip_date = $request->rideDate;
                $send_message->start_lat = $request->start_latitude;
                $send_message->start_lng = $request->start_longitude;
                $send_message->end_lat = $request->end_latitude;
                $send_message->end_lng = $request->end_longitude;
                $send_message->cost = $request->cost;
                $send_message->message = $request->message;
                $send_message->save();
                return response()->json([
                    'type' => "Request Ride"
                ]);
              break;
            default:
                $send_message = new SendMessage;
                $send_message->type = $request->type;
                $send_message->Fname = $request->Fname;
                $send_message->Lname = $request->Lname;
                $send_message->email = $request->email;
                $send_message->phone = $request->phone;
                $send_message->message = $request->message;
                $send_message->save();
                return response()->json([
                    'type' => "Others"
                ]);
          }
    }

}
