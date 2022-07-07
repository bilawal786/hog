<?php

namespace App\Http\Controllers\WebUser\Payment;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function payment()
    {
        $data = '{"customer":{"emailAddresses":{"elements":[{"id":"id","emailAddress":"emailAddress"}]},"id":"1","firstName":"firstName","lastName":"lastName"},"redirectUrls":{"success":"https://hog.codingcrust.com/","failure":"https://hog.codingcrust.com/","cancel":"https://hog.codingcrust.com/"},"shoppingCart":{"lineItems":[{"note":"note","price":900,"name":"name","unitQty":1}],"total":900}}';
//        $dataString = json_encode($data);


        $headers = [
            'Accept : application/json',
            'Authorization : Bearer 180e0e88-88a9-e8a4-8fb2-dc23f8feb2fa',
            'Content-Type : application/json',
            'X-Clover-Merchant-Id : KGDG6RFBZVP61',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://sandbox.dev.clover.com/invoicingcheckoutservice/v1/checkouts');

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $response1 = curl_exec($ch);
        $response = json_decode($response1);

        dd($response);

//        return redirect($response->url);

//view('front.payment.payment');

    }

    public function success()
    {
        view('front.payment.success');
    }

    public function failure()
    {
        view('front.payment.failure');
    }

    public function cancel()
    {
        view('front.payment.cancel');
    }
}
