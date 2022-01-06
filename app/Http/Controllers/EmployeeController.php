<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use DB;
use App\Employee;
use App\Role;
use App\User;

class EmployeeController extends Controller
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
    public function role_index(){
        $roles = Role::all();
        return view('admin.role_index', compact('roles'));
    }
    public function role_create(){
        return view('admin.role_create');
    }
    public function role_store(Request $request){
        $this->validate($request, [
            'name' => 'required'
        ]);
        $role = new Role;
        $role->name = $request->input('name');
        $role->save();
        return redirect()->route('admin.role_index');

    }
    public function role_user($id){
        $users = User::where('role_id', $id)->get();
        return $users;
    }

public function user_index(){
    $users = User::all();
    return view('admin.user_index', compact('users'));
}
public function user_create(){
    $roles = Role::all();
    return view('admin.user_create', compact('roles'));
}
public function user_store(Request $request){
    $this->validate($request, [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);
    
    if($request->input('role_id')!= ''){
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role_id = $request->input('role_id');
        $user->save();
        return redirect()->route('admin.user_index');
    }else{
        return 'Error';
    }
    


}
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $roles = Role::all();
        return view('add_employee', compact('roles'));

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
                $employee = DB::table('employees')->insert($data);

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
         $image=$request->photo;
            if($image){
            $image_name = str::random(5);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.' .$ext;
            $upload_path = 'public/employee/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

            if($success){
                $data['photo']=$image_url;
                $img=DB::table('employees')->where('id',$id)->first();
                $image_path = $img->photo;
                $done = unlink($image_path);
                $user = DB::table('employees')->where('id',$id)->update($data);

                if($user){
                    $notification = array(
                        'messege'=>'Succesfully Employee Inserted',
                         'alert-type'=>'success'
                    );
                    return Redirect()->route('all.employee')->with($notification);
                }else{
                   
                         return Redirect()->back();

                }
             } 

        }else{
                $oldphoto = $request->old_photo;
                if ($oldphoto) {
                    $data['photo'] = $oldphoto;
                    $user = DB::table('employees')->where('id',$id)->update($data);

                if($user){
                    $notification = array(
                        'messege'=>'Succesfully Employee Inserted',
                         'alert-type'=>'success'
                    );
                    return Redirect()->route('all.employee')->with($notification);
                }else{
                   
                         return Redirect()->back();

                }

                }

            }


       

        // $upd=DB::table('employees')->where('id',$id)->update($data);

        //  return redirect()->route('all.employee');

    }

   
}


