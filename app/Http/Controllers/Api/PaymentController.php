<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Order;
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
        $order = Order::find($request->order);

        $totalPrice = 0;

        foreach ($order->plate as $plate) {

            $totalPrice += ($plate->price * $plate->pivot->quantity);

        }

        $result = $gateway->transaction()->sale(
            [
                "amount" => $totalPrice,
                "paymentMethodNonce" => $request->token,
                "options" => [
                    "submitForSettlement" => true
                ]
            ]
        );

        if ($result->success) {
            $data = [
                "message" => "Transizione eseguita con successo",
                "price_transition" => $totalPrice
            ];

            $order->total_price = $totalPrice;
            $order->save();

            return response()->json($data);
        } else {
            $data = [
                "message" => "Transizione fallita"
            ];

            return response()->json($data);
        }

    }
}
