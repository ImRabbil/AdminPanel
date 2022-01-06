<?php

namespace App\Http\Controllers\SalesManager;
use App\SalesManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class CategoryController extends Controller
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


    public function AddCategory()
    {
        return view('sales.add_category');
    }

    public function AllCategory()
    {
        $category = DB::table('categories')->get();

        return view('sales.all_category',compact('category'));
    }
    public function InsertCategory(Request $request)
    {
        $data = array();
        $data['cat_name']=$request->cat_name;
        $cat = DB::table('categories')->insert($data);
         if($cat){
                    $notification = array(
                        'messege'=>'Succesfully Advanced Paid',
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

    public function DeleteCategory($id)
    {
        $dlt = DB::table('categories')->where('id',$id)->delete();
        return redirect()->route('all.category');

    }
     public function EditCategory($id)
     {
        $cat = DB::table('categories')->where('id',$id)->first();
        return view ('edit_category')->with('cat',$cat);

     }

     public function   UpdateCategory(Request $request,$id)
     {
        $data = array();
        $data['cat_name'] = $request->cat_name;
        $cat_up = DB::table('categories')->where('id',$id)->update($data);
        if($cat_up){
                    $notification = array(
                        'messege'=>'Succesfully Advanced Paid',
                         'alert-type'=>'success'
                    );
                    return Redirect()->route('all.category')->with($notification);
                }else{
                   $notification = array(
                        'messege'=>'Error', 
                        'alert-type'=>'success'
                    );
                   return Redirect()->back()->with($notification);

                }


     }
}
