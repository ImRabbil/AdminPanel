<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function Index()
    {
        
        $product = DB::table('products')
                    ->join('categories','products.cat_id','categories.id')
                    ->select('categories.cat_name','products.*')
                    ->get();
        $customer = DB::table('customers')->get();
        $category = DB::table('categories')->get();
        return view('pos',compact('product','customer','category'));
    }

    public function PendingOrders()
    {
        $pending = DB::table('orders')
        ->join('customers','orders.customer_id','customers.id')
        ->select('customers.name','orders.*')
        ->where('order_status','pending')->get();
        return view('pending_order',compact('pending'));
        
    }
    public function ViewOrder($id)
    {
        $order = DB::table('orders')
                ->join('customers','orders.customer_id','customers.id')
                 ->select('customers.*','orders.*')
                ->where('orders.id',$id)
                ->first();
        $order_details = DB::table('orderdetails')
        ->join('products','orderdetails.product_id','products.id')
        ->select('orderdetails.*','products.product_name','products.product_code')
                        ->where('order_id',$id)
                        ->get();
         
          // $order = DB::table('orders')
          //       ->join('employees','orders.employee_id','employees.id')
          //        ->select('employees.*','orders.*')
          //       ->where('orders.id',$id)
          //       ->first();

        return view('order_confirmation',compact('order','order_details'));

                // echo "<pre>";
                // print_r($order);
                //    echo "<br>";

                //  print_r($order_details);
    }
    public function PosDONE(Request $request, $id)

    {



                // $order = DB::table('orders')
                // ->join('customers','orders.customer_id','customers.id')
                // ->where('orders.id',$id)
                // ->get();
        $user = DB::table('orders')->where('id',$id)->update(['order_status'=>'success']);
         if($user){
                    
                    return Redirect()->route('pending.orders');
                }else{
                   
                         return Redirect()->back();

                     }

        // echo "<pre>";
        // print_r($order);
          
        




    }
    public function SuccessOrders()
    {
         $success = DB::table('orders')
        ->join('customers','orders.customer_id','customers.id')
        ->select('customers.name','orders.*')
        ->where('order_status','success')->get();
        

        return view('success_order',compact('success'));
        // echo "<pre>";
        //  print_r($success);

    }




    public function Stock()
    {
        $product = DB::table('products')->get();
        return view('stock_product',compact('product'));
     } 

     public function EditStock($id){
        $prod = DB::table('products')->where('id',$id)->first();
        return view('edit_stock',compact('prod'));

     }  
     public function UpdateStock(Request $request, $id)
     
         {
        $data = array();
        $data['product_quantity'] = $request->product_quantity;
        $Stock = DB::table('products')->where('id',$id)->update($data);
        if($Stock){
                    $notification = array(
                        'messege'=>'Succesfully Advanced Paid',
                         'alert-type'=>'success'
                    );
                    return Redirect()->route('stock')->with($notification);
                }else{
                   $notification = array(
                        'messege'=>'Error', 
                        'alert-type'=>'success'
                    );
                   return Redirect()->back()->with($notification);

                }
            // echo "hello";


     }

     
}
