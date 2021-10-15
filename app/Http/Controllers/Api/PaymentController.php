<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Plate;
use Braintree\Gateway;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function generate(Request $request, Gateway $gateway)
    {
        $clientToken = $gateway->clientToken()->generate();

        $data = [
            "status" => "success",
            "token" => $clientToken
        ];

        return response()->json($data);
    }

    public function makePayment(PaymentRequest $request, Gateway $gateway)
    {
        $plate = Plate::find($request->plates);

        $result = $gateway->transaction()->sale(
            [
                "amount" => $plate->price,
                "paymentMethodNonce" => $request->token,
                "options" => [
                    "submitForSettlement" => true
                ]
            ]
        );

        if ($result->success) {
            $data = [
                "message" => "Transizione eseguita con successo"
            ];

            return response()->json($data);
        } else {
            $data = [
                "message" => "Transizione fallita"
            ];

            return response()->json($data);
        }

    }
}
