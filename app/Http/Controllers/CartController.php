<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;
class CartController extends Controller
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
    public function Index(Request $request)
    {
        $data = array();
        $data['id']= $request->id;
        $data['name']= $request->name;
        $data['qty']= $request->qty;
        $data['price']= $request->price;

        // echo "<pre>";
        // print_r($data);

        $add = Cart::add($data);

         if($add){
                    $notification = array(
                        'messege'=>'Succesfully Employee Inserted',
                         'alert-type'=>'success'
                    );
                    return Redirect()->back()->with($notification);
                }else{
                   $notification = array(
                        'messege'=>'Error', 
                        'alert-type'=>'success'
                    );
                         return Redirect()->back()->with($notification);

                     }    







    }


    public function CartUpdate(Request $request,$rowId)
    {
        // $data = array();
        // $data['qty']=$request->qty;

        $qty = $request->qty;

         $update = Cart::update($rowId, $qty);
         if($update){
                    $notification = array(
                        'messege'=>'Succesfully Employee Inserted',
                         'alert-type'=>'success'
                    );
                    return Redirect()->back()->with($notification);
                }else{
                   $notification = array(
                        'messege'=>'Error', 
                        'alert-type'=>'success'
                    );
                         return Redirect()->back()->with($notification);

                     }   

    }

    public function CartRemove($rowId)
    {
        $remove = Cart::remove($rowId);
        if($remove){
                    $notification = array(
                        'messege'=>'Succesfully Employee Inserted',
                         'alert-type'=>'success'
                    );
                    return Redirect()->back()->with($notification);
                }else{
                   $notification = array(
                        'messege'=>'Error', 
                        'alert-type'=>'success'
                    );
                         return Redirect()->back()->with($notification);

                     }   

    }




    public function CreateInvoice(Request $request)
    {

         $validatedData = $request->validate([  'cus_id' => 'required',], ['cus_id.required' => 'Selelct A Customer First !!!']);
        // 'email' => 'required|max:255',
        // 'shop_name' => 'required|max:255',
        // 'address' => 'required',
        // 'phone' => 'required',
        // 'photo' => 'required',
        // 'account_holder' => 'required',
        // 'account_number' => 'required',
        // 'bank_name' => 'required',
         $cus_id = $request->cus_id;
          $customer=DB::table('customers')->where('id',$cus_id)->first();

          $contents = Cart::content();
          // echo "<pre>";
          // print_r($contents);
          $validatedData = $request->validate([  'emp_id' => 'required',], ['emp_id.required' => 'Selelct Employee First !!!']);
           $emp_id = $request->emp_id;
           $employee = DB::table('employees')->where('id',$emp_id)->first();


    


       return view('invoice',compact('customer','contents','employee'));
    }




    public function FinalInvoice(Request $request)

    {
        $data = array();
        $data['customer_id']=$request->customer_id;
        $data['order_date']=$request->order_date;
        $data['order_status']=$request->order_status;
        $data['total_products']=$request->total_products;
        $data['sub_total']=$request->sub_total;
        $data['vat']=$request->vat;
        $data['total']=$request->total;
        $data['payment_status']=$request->payment_status;
        $data['pay']=$request->pay;
        $data['due']=$request->due;

        // echo "<pre>";
        // print_r($data);
        // exit();
        $order_id = DB::table('orders')->insertGetId($data);
        $contents=Cart::content();

        $odata=array();

        foreach($contents as $content)
        {
            $odata['order_id']=$order_id;
            $odata['product_id']=$content->id;
            $odata['quantity']=$content->qty;
            $odata['unicost']=$content->price;
            $odata['total']=$content->total;
             $insert = DB::table('orderdetails')->insert($odata);
             if($insert){
                $product = DB::table('products')->where('id',$content->id)->select('product_quantity as qty')->first();
                $newqty =$product->qty- $content->qty;
                $newProduct = DB::table('products')->where('id',$content->id)->update(['product_quantity'=> $newqty]);
                // dd($product);
             }

            
        }

        if($insert){
                    $notification = array(
                        'messege'=>'Succesfully Employee Inserted',
                         'alert-type'=>'success'
                    );
                    Cart::destroy();
                    return Redirect()->route('pending.orders')->with($notification);
                }else{
                   $notification = array(
                        'messege'=>'Error', 
                        'alert-type'=>'success'
                    );
                         return Redirect()->back()->with($notification);

                     } 



    }





}
