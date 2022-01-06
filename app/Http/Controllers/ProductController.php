<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use DB;
use Picqer;

class ProductController extends Controller
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

    public function AddProduct()
    {
        return view('add_product');
    }

    public function AllProduct()
    {
        $product = DB::table('products')->get();
        return view('all_product',compact('product'));
    }

    public function InsertProduct(Request $request)
    {
        $validatedData = $request->validate([

        'product_name' => 'required|max:255',
        'product_code' => 'required|max:255',
        'cat_id' => 'required|max:255',
        'sup_id' => 'required',
        
        'buy_date' => 'required',
        'product_route' => 'required',
        'expire_date' => 'required',
        'selling_price' => 'required',
        'product_image' => 'required',
        'product_quantity' => 'required',


    ]);

        $product_route = $request->product_route;



        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
    $product_garage = $generator->getBarcode($product_route, $generator::TYPE_CODE_128);





        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['cat_id'] = $request->cat_id;
        $data['sup_id'] = $request->sup_id;
        // $data->barcode=$barcode;
        $data['product_garage'] =  $product_garage;
        $data['product_route'] = $request->product_route;
        $data['buy_date'] = $request->buy_date;
        $data['expire_date'] = $request->expire_date;
        $data['buying_price'] = $request->buying_price;
        $data['selling_price'] = $request->selling_price;
        $data['product_quantity'] = $request->product_quantity;

        // echo "<pre>";
        // print_r($data);
        // exit();
        $image = $request->file('product_image');

        if($image){
            $image_name = str::random(5);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.' .$ext;
            $upload_path = 'public/product/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

            if($success){
                $data['product_image']=$image_url;
                $product=DB::table('products')->insert($data);

                if($product){
                    $notification = array(
                        'messege'=>'Succesfully Employee Inserted',
                         'alert-type'=>'success'
                    );
                    return Redirect()->route('all.product')->with($notification);
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

   public function DeleteProduct($id){
       //  $delete = DB::table('employees')->where('id',$id)->first();
       
       //  $photo=$delete->photo;

        

       // unlink($photo);
       $dltuser = DB::table('products')->where('id',$id)->delete();
        return redirect()->route('all.product');
         }


         public function ViewProduct($id)
         {
            $view = DB::table('products')
                 ->join('categories','products.cat_id','categories.id')
                 ->join('suppliers','products.sup_id','suppliers.id')
                 ->select('categories.cat_name','products.*','suppliers.name')
                 ->where('products.id',$id)
                 ->first();

        // echo "<pre>";
        // print_r($view);
        // exit();
                 return view('view_product', compact('view'));
         }

         public function EditProduct($id)
         {
            $prod = DB::table('products')->where('id',$id)->first();
            return view('edit_product', compact('prod'));
            
         }


         public function UpdateProduct(Request $request, $id)
         {
            $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['product_quantity'] = $request->product_quantity;
        $data['cat_id'] = $request->cat_id;
        $data['sup_id'] = $request->sup_id;
        $data['product_garage'] = $request->product_garage;
        $data['product_route'] = $request->product_route;
        $data['buy_date'] = $request->buy_date;
        $data['expire_date'] = $request->expire_date;
        $data['buying_price'] = $request->buying_price;
        $data['selling_price'] = $request->selling_price;

         $image=$request->product_image;
            if($image){
            $image_name = str::random(5);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.' .$ext;
            $upload_path = 'public/product/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

            if($success){
                $data['product_image']=$image_url;
                $img=DB::table('products')->where('id',$id)->first();
                $image_path = $img->product_image;
                $done = unlink($image_path);
                $user = DB::table('products')->where('id',$id)->update($data);

                if($user){
                    $notification = array(
                        'messege'=>'Succesfully Employee Inserted',
                         'alert-type'=>'success'
                    );
                    return Redirect()->route('all.product')->with($notification);
                }else{
                   
                         return Redirect()->back();

                }
             } 

        }else{
                $oldphoto = $request->old_photo;
                if ($oldphoto) {
                    $data['product_image'] = $oldphoto;
                    $user = DB::table('products')->where('id',$id)->update($data);

                if($user){
                    $notification = array(
                        'messege'=>'Succesfully Employee Inserted',
                         'alert-type'=>'success'
                    );
                    return Redirect()->route('all.product')->with($notification);
                }else{
                   
                         return Redirect()->back();

                }

                }

            }
         }



        //  public function Barcode(){
        //     $product = DB::table('products')->get();
        // return view('barcode',compact('product'));

        //  }


}


