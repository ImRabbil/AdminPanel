<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SalesController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function TodaySales()
    {
        $date = date("d/m/y");
        $sales = DB::table('orders')
               ->join('products','orders.customer_id','products.id')
               ->join('customers','orders.customer_id','customers.id')
               ->select('customers.name','products.product_name','orders.total_products','orders.total')
               ->where('order_date',$date)->get();
        
    
        return view('today_sales',compact('sales'));
    }
    public function TodayMonthly()
    {
         return view('monthly_sales');

    }
}
