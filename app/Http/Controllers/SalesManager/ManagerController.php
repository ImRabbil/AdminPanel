<?php

namespace App\Http\Controllers\SalesManager;
use App\SalesManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Picqer;

class ManagerController extends Controller
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


    public function index()
    {
        return view('sales.pos');
    }
     public function Barcode(){
            $product = DB::table('products')->get();
        return view('sales.barcode',compact('product'));

         }
}
