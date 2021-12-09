<?php

namespace App\Http\Controllers\User;

use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;
use DB;

class UserController extends Controller
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

     public function index(){
      $product = DB::table('products')
                    ->join('categories','products.cat_id','categories.id')
                    ->select('categories.cat_name','products.*')
                    ->get();
        $customer = DB::table('customers')->get();
        $category = DB::table('categories')->get();
        return view('user.pos',compact('product','customer','category'));
        // return view('user.index');
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


    


       return view('user.invoice',compact('customer','contents','employee'));
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
                    return Redirect()->route('user.pending.orders')->with($notification);
                }else{
                   $notification = array(
                        'messege'=>'Error', 
                        'alert-type'=>'success'
                    );
                         return Redirect()->back()->with($notification);

                     } 



    }



    public function PendingOrders()
    {
        $pending = DB::table('orders')
        ->join('customers','orders.customer_id','customers.id')
        ->select('customers.name','orders.*')
        ->where('order_status','pending')->get();
        return view('user.pending_order',compact('pending'));
        
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

        return view('user.order_confirmation',compact('order','order_details'));

   }


   public function SuccessOrders()
    {
         $success = DB::table('orders')
        ->join('customers','orders.customer_id','customers.id')
        ->select('customers.name','orders.*')
        ->where('order_status','success')->get();
        

        return view('user.success_order',compact('success'));
        // echo "<pre>";
        //  print_r($success);

    }



    public function PosDONE(Request $request, $id)

    {



                // $order = DB::table('orders')
                // ->join('customers','orders.customer_id','customers.id')
                // ->where('orders.id',$id)
                // ->get();
        $user = DB::table('orders')->where('id',$id)->update(['order_status'=>'success']);
         if($user){
                    
                    return Redirect()->route('user.pending.orders');
                }else{
                   
                         return Redirect()->back();

                     }

        // echo "<pre>";
        // print_r($order);
          
        




    }









}
