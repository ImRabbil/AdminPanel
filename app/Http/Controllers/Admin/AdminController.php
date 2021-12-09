<?php

namespace App\Http\Controllers\Admin;
use DB;


use App\LogActivity;
use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){

         $employee = DB::table('employees')->count();
        $user = DB::table('users')->count();
        $order = DB::table('orders')->count();
        $customer = DB::table('customers')->count();
        $product = DB::table('products')->count();
        $category = DB::table('categories')->count();
        $supplier = DB::table('suppliers')->count();


        return view('admin.index',compact('employee','user','order','customer','product','category','supplier'));
        // return view('admin.index');
    }
}
