<?php

namespace App\Http\Controllers;

use App\Chart;
use App\Order;
use App\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChartController extends Controller
{
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
        foreach ($plates as $plate)
        {
            foreach ($plate->order as $order)
            {
                if (!in_array($order->id, $ordersId)) {
                    $ordersId[]=$order->id;
                }
            }
        }
        $orders = Order::whereIn('id', $ordersId)->orderBy('created_at', 'ASC')->get(['id', 'created_at', 'total_price']);


        foreach($orders as $order){
        $month_no = $order->created_at->format('m');
        $month_name = $order->created_at->format('d M, Y');
        $monthsName[]=$month_name;
        // $monthsNo[]=$month_no;
        $price = $order->total_price;
        $priceAll[] = $price; 
}                    
        return view ('static.index', compact('ordersId', 'orders', 'monthsName', 'priceAll'));     
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
     * @param  \App\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function show(Chart $chart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function edit(Chart $chart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chart $chart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chart $chart)
    {
        //
    }
}