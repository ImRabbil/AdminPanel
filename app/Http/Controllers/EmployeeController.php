<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use DB;
use App\Employee;

class EmployeeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('add_employee');

    }

    //insert employees
    public function store(Request $request)
    {
        $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|unique:employees|max:255',
        'nid_no' => 'required|unique:employees|max:255',
        'address' => 'required',
        'phone' => 'required',
        'photo' => 'required',
        'salary' => 'required',
        'experience' => 'required',
        'city' => 'required',


    ]);
        $data=array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['experience'] = $request->experience;
        $data['nid_no'] = $request->nid_no;
        $data['salary'] = $request->salary;
        $data['vacation'] = $request->vacation;
        $data['city'] = $request->city;
        $image = $request->file('photo');

        if($image){
            $image_name = str::random(5);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.' .$ext;
            $upload_path = 'public/employee/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

            if($success){
                $data['photo']=$image_url;
                $employee=DB::table('employees')->insert($data);

                if($employee){
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

    //all employees return here

    public function Employees(){
        $employees = Employee::all();
        return view('all_employee', compact('employees'));

    }

    public function ViewEmployee($id){
        $single = DB::table('employees')->where('id',$id)->first();
        return view('view_employee', compact('single'));

    }

    public function DeleteEmployee($id){
       //  $delete = DB::table('employees')->where('id',$id)->first();
       
       //  $photo=$delete->photo;

        

       // unlink($photo);
       $dltuser = DB::table('employees')->where('id',$id)->delete();
        return redirect()->route('all.employee');





    }


    public function EditEmployee($id){
        $edit = DB::table('employees')->where('id',$id)->first();

         return view('edit_employee', compact('edit'));



    }

    // public function UpdateEmployee(Request $request, $id){

       
        // $data=array();
        // $data['name'] = $request->name;
        // $data['email'] = $request->email;
        // $data['phone'] = $request->phone;
        // $data['address'] = $request->address;
        // $data['experience'] = $request->experience;
        // $data['nid_no'] = $request->nid_no;
        // $data['salary'] = $request->salary;
        // $data['vacation'] = $request->vacation;
        // $data['city'] = $request->city;
        //  // $image=$request->photo;

        // $upd=DB::table('employees')->where('id',$id)->update($data);

        //  return redirect()->route('all.employee');

    //     }

    public function UpdateEmployee(Request $request, $id){
         $data=array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['experience'] = $request->experience;
        $data['nid_no'] = $request->nid_no;
        $data['salary'] = $request->salary;
        $data['vacation'] = $request->vacation;
        $data['city'] = $request->city;
         // $image=$request->photo;

        $upd=DB::table('employees')->where('id',$id)->update($data);

         return redirect()->route('all.employee');

    }

   
}


