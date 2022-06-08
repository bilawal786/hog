<?php

namespace App\Http\Controllers\Api;

use App\SendMessage;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class SendMessageController extends Controller
{
    public function sendMessage(Request $request){
        
        switch ($request->type) {
            case "Submit Feedback":
                try {
                    $validated = $request->validate([
                        'type' => 'required|max:255',
                        'Fname' => 'required|max:255',
                        'Lname' => 'required|max:255',
                        'email' => 'required|max:255',
                        'phone' => 'required|max:255',
                        ]);
                    }
                    catch (ValidationException $exception) {
                        return response()->json([
                            'status' => 'error',
                            'msg'    => 'Error',
                            'errors' => $exception->errors(),
                        ], 422);
                    }
                $send_message = new SendMessage;
                $send_message->type = $request->type;
                $send_message->Fname = $request->Fname;
                $send_message->Lname = $request->Lname;
                $send_message->email = $request->email;
                $send_message->phone = $request->phone;
                $send_message->account = $request->account;
                $send_message->message = $request->message;
                $send_message->user_id = $request->user_id;
                $send_message->save();
                return response()->json([
                    'type' => "Submit Feedback"
                ]);

              break;
            case "Billing Question":
                try {
                    $validated = $request->validate([
                        'type' => 'required|max:255',
                        'Fname' => 'required|max:255',
                        'Lname' => 'required|max:255',
                        'email' => 'required|max:255',
                        'phone' => 'required|max:255',
                        ]);
                    }
                    catch (ValidationException $exception) {
                        return response()->json([
                            'status' => 'error',
                            'msg'    => 'Error',
                            'errors' => $exception->errors(),
                        ], 422);
                    }
                $send_message = new SendMessage;
                $send_message->type = $request->type;
                $send_message->Fname = $request->Fname;
                $send_message->Lname = $request->Lname;
                $send_message->email = $request->email;
                $send_message->phone = $request->phone;
                $send_message->account = $request->account;
                $send_message->invice = $request->invoice;
                $send_message->message = $request->message;
                $send_message->user_id = $request->user_id;
                $send_message->save();
                return response()->json([
                    'type' => "Billing Question"
                ]);
             
              break;
            case "Request Ride":
                try {
                    $validated = $request->validate([
                        'type' => 'required|max:255',
                        'Fname' => 'required|max:255',
                        'Lname' => 'required|max:255',
                        'email' => 'required|max:255',
                        'phone' => 'required|max:255',
                        'wheelchair' => 'required',
                        'round_trip' => 'required',
                        'trip_date' => 'required',
                        'start_lat' => 'required|max:255',
                        'start_lng' => 'required|max:255',
                        'end_lat' => 'required|max:255',
                        'end_lng' => 'required|max:255',
                        'start_address' => 'required|max:255',
                        'end_address' => 'required|max:255',
                        'cost' => 'required|max:255',
                        'status_assign' => 'required|max:255',
                        ]);
                    }
                    catch (ValidationException $exception) {
                        return response()->json([
                            'status' => 'error',
                            'msg'    => 'Error',
                            'errors' => $exception->errors(),
                        ], 422);
                    }
                $send_message = new SendMessage;
                $send_message->type = $request->type;
                $send_message->Fname = $request->Fname;
                $send_message->Lname = $request->Lname;
                $send_message->email = $request->email;
                $send_message->phone = $request->phone;
                $send_message->wheelchair = $request->wheelchair;
                $send_message->round_trip = $request->round_trip;
                $send_message->trip_date = $request->trip_date;
                $send_message->start_lat = $request->start_lat;
                $send_message->start_lng = $request->start_lng;
                $send_message->end_lat = $request->end_lat;
                $send_message->end_lng = $request->end_lng;
                $send_message->distance = $this->distance($request->start_lat, $request->start_lng, $request->end_lat, $request->end_lng, 'K');
                $send_message->start_address = $request->start_address;
                $send_message->end_address = $request->end_address;
                $send_message->cost = $request->cost;
                $send_message->message = $request->message;
                $send_message->user_id = $request->user_id;
                $send_message->status_assign = $request->status_assign;
                $send_message->save();
                return response()->json([
                    'type' => "Request Ride"
                ]);
              break;
            default:
            try {
                $validated = $request->validate([
                    'type' => 'required|max:255',
                    'Fname' => 'required|max:255',
                    'Lname' => 'required|max:255',
                    'email' => 'required|max:255',
                    'phone' => 'required|max:255',
                    ]);
                }
                catch (ValidationException $exception) {
                    return response()->json([
                        'status' => 'error',
                        'msg'    => 'Error',
                        'errors' => $exception->errors(),
                    ], 422);
                }
                $send_message = new SendMessage;
                $send_message->type = $request->type;
                $send_message->Fname = $request->Fname;
                $send_message->Lname = $request->Lname;
                $send_message->email = $request->email;
                $send_message->phone = $request->phone;
                $send_message->message = $request->message;
                $send_message->user_id = $request->user_id;
                $send_message->save();
                return response()->json([
                    'type' => "Others"
                ]);
          }
    }
    public function distance($lat1, $lon1, $lat2, $lon2, $unit) {
        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
          return 0;
        }
        else {
          $theta = $lon1 - $lon2;
          $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
          $dist = acos($dist);
          $dist = rad2deg($dist);
          $miles = $dist * 60 * 1.1515;
          $unit = strtoupper($unit);
      
          if ($unit == "K") {
            return ($miles * 1.609344);
          } else if ($unit == "N") {
            return ($miles * 0.8684);
          } else {
            return $miles;
          }
        }
      }
}
