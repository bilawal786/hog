<?php

namespace App\Http\Controllers\WebUser\Payment;

use App\GeneralSetting;
use App\Http\Controllers\Controller;
use App\Mail\RequestRide;
use App\SendMessage;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function payment($id)
    {
        $requestride = SendMessage::where('id', $id)->first();
        $client = new Client();

        $response = $client->request('POST', 'https://sandbox.dev.clover.com/invoicingcheckoutservice/v1/checkouts', [
            'body' => '{
                "customer":{
                    "emailAddresses":{
                        "elements":[{
                            "id":"id",
                            "emailAddress":"'.$requestride->email.'"
                        }]
                    },
                    "id":'.$requestride->id.',
                    "firstName":"'.$requestride->Fname.'",
                    "lastName": "'.$requestride->Lname.'"
                },
                "redirectUrls":{
                    "success": "https://hog.codingcrust.com/success/'.$requestride->id.'",
                    "failure":"https://hog.codingcrust.com/",
                    "cancel":"https://hog.codingcrust.com/"
                },
            "shoppingCart":{
                "lineItems":[{
                    "note":'.$requestride->id.',
                    "price":'.(int)($requestride->cost * 100).',
                    "name":"Request a Ride",
                    "unitQty":1
                }],
                "total":'.(int)($requestride->cost * 100).'
            }
            }',
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer 180e0e88-88a9-e8a4-8fb2-dc23f8feb2fa',
                'Content-Type' => 'application/json',
                'X-Clover-Merchant-Id' => 'KGDG6RFBZVP61',
            ],
        ]);

        $response = (string) $response->getBody();
        $response =json_decode($response); // Using this you can access any key like below
        $key_value = $response->href;
        return redirect($key_value);

//view('front.payment.payment');

    }

    public function success($id)
    {
        $adminmail = GeneralSetting::find(1)->email;
        SendMessage::where('id', $id)->update(['payment' => 'yes']);
        $data = SendMessage::where('id', $id)->first();
        Mail::to($data->email)
            ->cc($adminmail)
            ->send(new RequestRide($data));
        return view('front.payment.successa', compact('data'));
    }

    public function failure($id)
    {
        SendMessage::where('id', $id)->update(['payment' => 'no']);
        $data = SendMessage::where('id', $id)->first();
        return view('front.payment.failure', compact('data'));
    }

    public function cancel($id)
    {
        SendMessage::where('id', $id)->update(['payment' => 'no']);
        $data = SendMessage::where('id', $id)->first();
        return  view('front.payment.cancel', compact('data'));
    }
}
