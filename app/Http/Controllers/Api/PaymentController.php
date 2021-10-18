<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Mail\RestaurantMail;
use App\Order;
use App\Plate;
use App\User;
use Braintree\Gateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            $plateId = $plate->id;
        }

        $searchPlate = Plate::find($plateId);
        $userId = $searchPlate->user_id;
        $userToSend = User::find($userId);

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

            //Mail::to('prova@io.com')->send(new RestaurantMail($userToSend));

            return response()->json($data);
        } else {
            $data = [
                "message" => "Transizione fallita"
            ];

            return response()->json($data);
        }

    }
}
