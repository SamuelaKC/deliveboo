<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Auth::id();
        $plates = User::find($users)->plate;
        $ordersId = [];
        foreach ($plates as $plate) {
            foreach ($plate->order as $order) {
                if (!in_array($order->id, $ordersId)) {
                    $ordersId[] = $order->id;
                }
            }
        }
        $orders = Order::whereIn('id', $ordersId)->get();
        $ingredients = Ingredient::all();
        
        $allOrders = [];
        foreach ($orders as $order) {
            $orderGraph = [];
            foreach ($order->plate as $plate) {
                $addArray = explode(', ', $plate->pivot->addition);
                $totalAdd = 0;
                foreach ($addArray as $stringAdd) {
                    foreach ($ingredients as $ingredient) {

                        if ($stringAdd === $ingredient->name) {
                            $totalAdd += $ingredient->price;
                        }
                    }
                }

                $orderGraph[] = [
                    'quantity' => $plate->pivot->quantity,
                    'name' => $plate->name,
                    'addition' => $plate->pivot->addition,
                    'priceAdd' => $totalAdd,
                    'price' => $plate->price,
                ];
            }

            array_push($allOrders, [
                'name_surname' => $order->name_surname,
                'address' => $order->address,
                'phone_number' => $order->phone_number,
                'details' => $order->details,
                'total_price' => $order->total_price,
                'plateOrder' => $orderGraph,
            ]);

        }

        return view('orders.index', compact('ordersId', 'orders', 'allOrders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
