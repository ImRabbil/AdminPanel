<?php

namespace App\Http\Controllers\SalesManager;
use App\SalesManager;
use Illuminate\Support\Str;
use DB;
use App\Customer;

use App\Http\Controllers\Controller;
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
        return view('sales.add_customer');
    }

    public function Store(Request $request){

        $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|max:255',
        'shop_name' => 'required|max:255',
        'address' => 'required',
        'phone' => 'required',
        'photo' => 'required',
        'account_holder' => 'required',
        'account_number' => 'required',
        'bank_name' => 'required',


    ]);


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
            $upload_path = 'public/customer/';
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
                    return Redirect()->back()->with($notification);
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

        return view('sales.all_customer')->with('customer', $customer);
    }


    public function ViewCustomer($id){
        $single = DB::table('customers')->where('id',$id)->first();
        return view('sales.view_customer', compact('single'));

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
         return view('sales.edit_customer',compact('edit'));


    }

    public function UpdateCustomer(Request $request,$id)
    {
        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $image=$request->photo;
            if($image){
            $image_name = str::random(5);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.' .$ext;
            $upload_path = 'public/customer/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

            if($success){
                $data['photo']=$image_url;
                $img=DB::table('customers')->where('id',$id)->first();
                $image_path =$img->photo;
                $done = unlink($image_path);
                $user = DB::table('customers')->where('id',$id)->update($data);

                if($user){
                    $notification = array(
                        'messege'=>'Succesfully Employee Inserted',
                         'alert-type'=>'success'
                    );
                    return Redirect()->route('all.customer')->with($notification);
                }else{
                   
                         return Redirect()->back();

                }
             } 

        }else{
                $oldphoto = $request->old_photo;
                if ($oldphoto) {
                    $data['photo'] = $oldphoto;
                    $user = DB::table('customers')->where('id',$id)->update($data);

                if($user){
                    $notification = array(
                        'messege'=>'Succesfully Employee Inserted',
                         'alert-type'=>'success'
                    );
                    return Redirect()->route('all.customer')->with($notification);
                }else{
                   
                         return Redirect()->back();

                }

                }

            }




        // $upd=DB::table('customers')->where('id',$id)->update($data);

        //  return redirect()->route('all.customer');

    }
}
