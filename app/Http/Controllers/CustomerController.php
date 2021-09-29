<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use DB;
use App\Customer;

use Illuminate\Http\Request;

class CustomerController extends Controller
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

    //new customer form view

    public function index(){
        return view('add_customer');
    }

    public function Store(Request $request){

         $data=array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['shop_name'] = $request->shop_name;
        $data['account_holder'] = $request->account_holder;
        $data['account_number'] = $request->account_number;
        $data['bank_name'] = $request->bank_name;
         $data['bank_branch'] = $request->bank_branch;
        $data['city'] = $request->city;

        // echo "<pre>";
        // print_r($data);
        // exit();
        $image = $request->file('photo');

        if($image){
            $image_name = str::random(5);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.' .$ext;
            $upload_path = '/public/customer/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success){
                $data['photo']=$image_url;
                $customer=DB::table('customers')->insert($data);
                if($customer){
                    $notification = array(
                        'messege'=>'Succesfully Employee Inserted',
                         'alert-type'=>'success'
                    );
                    return Redirect()->route('home')->with($notification);
                }else{
                   $notification = array(
                        'messege'=>'Error', 
                        'alert-type'=>'success'
                    );
                   return Redirect()->back()->with($notification);

                }
            }else{
                return Redirect()->back();

            }

        }else{
            return Redirect()->back();
        }

    }

    public function Customers(){
        $customer= DB::table('customers')->get();

        return view('all_customer')->with('customer', $customer);
    }


    public function ViewCustomer($id){
        $single = DB::table('customers')->where('id',$id)->first();
        return view('view_customer', compact('single'));

    }

    public function DeleteCustomer($id){
       //  $delete = DB::table('employees')->where('id',$id)->first();
       
       //  $photo=$delete->photo;

        

       // unlink($photo);
       $dltuser = DB::table('customers')->where('id',$id)->delete();
        return redirect()->route('all.customer');





    }


    public function EditCustomer($id)
    {
         $edit = DB::table('customers')->where('id',$id)->first();
         return view('edit_customer',compact('edit'));
    }

    public function UpdateCustomer(Request $request,$id)
    {
        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $upd=DB::table('customers')->where('id',$id)->update($data);

         return redirect()->route('all.customer');

    }
}
