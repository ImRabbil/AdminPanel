<?php

namespace App\Http\Controllers\StockManager;
use App\StockManager;

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

     public function Barcode(){
            $product = DB::table('products')->get();
        return view('stock.barcode',compact('product'));

         }
}