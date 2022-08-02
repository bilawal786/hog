<?php

namespace App\Http\Controllers\Api;

use App\GeneralSetting;
use App\Mail\BillingQuestion;
use App\Mail\Feedback;
use App\Mail\Others;
use App\Mail\RequestRide;
use App\SendMessage;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class SendMessageController extends Controller
{
    public function sendMessage(Request $request){
        $adminmail = GeneralSetting::find(1)->email;

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
                Mail::to($send_message->email)
                    ->cc($adminmail)
                    ->send(new Feedback($send_message));
                $notification = array(
                    'messege' => 'Submit Feedback successfully!',
                    'type' => 'success'
                );
                return response()->json($notification);


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
                Mail::to($send_message->email)
                    ->cc($adminmail)
                    ->send(new BillingQuestion($send_message));
                $notification = array(
                    'messege' => 'Billing Question successfully!',
                    'type' => 'success'
                );
                return response()->json($notification);

              break;
            case "Request Ride":
                try {
                    $validated = $request->validate([
                        'type' => 'required|max:255',
                        'Fname' => 'required|max:255',
                        'Lname' => 'required|max:255',
                        'email' => 'required|max:255',
                        'phone' => 'required|max:255',
                        'facility' => 'max:255',
                        'waiting' => 'max:255',
                        'wheelchair' => 'required',
                        'round_trip' => 'required',
                        'trip_date' => 'required',
                        'start_lat' => 'required|max:255',
                        'start_lng' => 'required|max:255',
                        'end_lat' => 'required|max:255',
                        'end_lng' => 'required|max:255',
                        'start_address' => 'required|max:255',
//                        'start_city' => 'required|max:255',
                        'start_country' => 'required|max:255',
                        'end_address' => 'required|max:255',
//                        'end_city' => 'required|max:255',
                        'end_country' => 'required|max:255',
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
                $send_message->ridePerson = $request->ridePerson;
                $send_message->else_first_name = $request->else_first_name;
                $send_message->else_last_name = $request->else_last_name;
                $send_message->familycaregive = $request->familycaregive;
                $send_message->num_family_member = $request->num_family_member;
                $send_message->pertaining = $request->pertaining;
                $send_message->appt_length = $request->appt_length;
                $send_message->facility = $request->facility;
                $send_message->wheelchair = $request->wheelchair;
                $send_message->round_trip = $request->round_trip;
                $send_message->trip_date = $request->trip_date;
                $send_message->start_lat = $request->start_lat;
                $send_message->start_lng = $request->start_lng;
                $send_message->end_lat = $request->end_lat;
                $send_message->end_lng = $request->end_lng;
                $send_message->distance = $this->distance($request->start_lat, $request->start_lng, $request->end_lat, $request->end_lng, 'K');
                $send_message->start_address = $request->start_address;
                $send_message->start_city = $request->start_city;
                $send_message->start_country = $request->start_country;
                $send_message->end_address = $request->end_address;
                $send_message->end_city = $request->end_city;
                $send_message->end_country = $request->end_country;
                $send_message->cost = $request->cost;
                $send_message->message = $request->message;
                $send_message->user_id = $request->user_id;
                $send_message->status_assign = $request->status_assign;
                $send_message->payment = 'no';
                $send_message->save();
                $idnew = $send_message->id;
                $notification = array(
                    'messege' => 'Request Ride successfully!',
                    'type' => 'success',
                    'id' => $idnew
                );
                return response()->json($notification);
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
                Mail::to($send_message->email)
                    ->cc($adminmail)
                    ->send(new Others($send_message));
                $notification = array(
                    'messege' => 'Others querry successfully!',
                    'type' => 'success'
                );
                return response()->json($notification);

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
