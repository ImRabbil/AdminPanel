<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller 
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employee = DB::table('employees')->count();
        $user = DB::table('users')->count();
        $order = DB::table('orders')->count();
        $customer = DB::table('customers')->count();
        $product = DB::table('products')->count();
        $category = DB::table('categories')->count();
        $supplier = DB::table('suppliers')->count();


        return view('home',compact('employee','user','order','customer','product','category','supplier'));
    }
}
