<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Support\Facades\Auth;



class ChartDataController extends Controller
{


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
        $orders = Order::whereIn('id', $ordersId)->get(['id', 'created_at', 'total_price']);
        foreach($orders as $order){
        $month = $order->created_at;
        $price = $order->total_price;
        $this->getMonthlyOrderData();
}                    



        return view ('static.index', compact('ordersId', 'orders'));     
    }

    //questa funzione mette tutti i mesi che trova negli ordini 
    function getAllMonths() {

        $monthArray = array();
        $ordersDate = Order::orderBy('created_at', 'ASC')->pluck('created_at');
        $ordersDate = json_decode($ordersDate);

        if (!empty($ordersDate)) {
            foreach ($ordersDate as $unformatted_date) {
                $date = new \DateTime( $unformatted_date);
                $month_no = $date->format('m');
                $month_name = $date->format('M');
                $monthArray[ $month_no] = $month_name; 
            }

        }
        return $monthArray;
    }

    //questa funzione conta gli ordini che ci sono in ogni mese
    function getMonthlyOrderCount ($month) {
        $monthly_order_count = Order::whereMonth('created_at', $month)->get()->count();
        return $monthly_order_count; 
    }

    //questa funzione unisce i mesi e la conta degli ordini mettendo il massimo 

    function getMonthlyOrderData () {

        $monthly_order_data_array = array(); 

        $monthly_order_count_array = array();

        $month_name_array = array(); 

        $monthArray = $this->getAllMonths(); 
        if (!empty($monthArray)) {
            
            foreach ($monthArray as $month_no => $month_name) {
                $monthly_order_count = $this->getMonthlyOrderCount($month_no); 
                array_push($monthly_order_count_array, $monthly_order_count);
                array_push ($month_name_array, $month_name);
            }
        }
            $max_no = max($monthly_order_count_array); 
            $max = round(value($max_no + 10/2) /10) * 10;
            $monthly_order_data_array = array(
                'months' => $month_name_array, 
                'order_count_data' => $monthly_order_count_array, 
                'max' => $max,
            ); 

            return $monthly_order_data_array;
    }
}