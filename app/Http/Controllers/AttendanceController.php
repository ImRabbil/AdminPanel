<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Attendance;
class AttendanceController extends Controller
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
    public function TakeAttendance()
    {
        $employee = DB::table('employees')->get();
        return view('take_attendance',compact('employee'));
    }
    public function InsertAttendance(Request $request)
    {
        // $data = array();
        // $data['att_date']=$request->att_date;
        // $data['att_year']=$request->att_year;
        // echo "<pre>";
        // print_r($data);

        // return $request->all();

        $date = $request->att_date;
        $att_date = DB::table('attendances')->where('att_date',$date)->first();
        if ($att_date) {
            $notification = array(
                        'messege'=>'Error', 
                        'alert-type'=>'success'
                    );
                         return Redirect()->back()->with($notification);
                      }else{
         foreach ($request->user_id as $id) {

            $data[]=[
                    "user_id"=>$id,
                    "attendance"=>$request->attendance[$id],
                    "att_date"=>$request->att_date,
                    "att_year"=>$request->att_year,
                    "month"=>$request->month,
                    "edit_date"=>date("d_m_y")

            ];
        }
        $att = DB::table('attendances')->insert($data);
        if($att){
                    $notification = array(
                        'messege'=>'Succesfully Employee Inserted',
                         'alert-type'=>'success'
                    );
                    return Redirect()->route('all.attendance')->with($notification);
                }else{
                   $notification = array(
                        'messege'=>'Error', 
                        'alert-type'=>'success'
                    );
                         return Redirect()->back()->with($notification);

                }

             }

          }
     public function AllAttendance()
     {
        $all_att = DB::table('attendances')->select('edit_date')->groupBy('edit_date')->get();
        return view('all_attendance',compact('all_att'));

     }

     public function EditAttendance($edit_date)
     {
        $date = DB::table('attendances')->where('edit_date',$edit_date)->first();
        $data = DB::table('attendances')->join('employees','attendances.user_id','employees.id')->select('employees.name','employees.photo','attendances.*')->where('edit_date',$edit_date)->get();
        return view('edit_attendance',compact('data','date'));

     }

     public function UpdateAttendance(Request $request)
     {
        foreach ($request->id as $id) {

            $data=[
                    "attendance"=>$request->attendance[$id],
                    "att_date"=>$request->att_date,
                    "att_year"=>$request->att_year,
                    "month"=>$request->month

            ];
            $attendance = Attendance ::where(['att_date' =>$request->att_date,'id' =>$id])->first();
            $attendance->update($data);
        }
         if($attendance){
                    $notification = array(
                        'messege'=>'Succesfully Employee Inserted',
                         'alert-type'=>'success'
                    );
                    return Redirect()->route('all.attendance')->with($notification);
                }else{
                   $notification = array(
                        'messege'=>'Error', 
                        'alert-type'=>'success'
                    );
                         return Redirect()->back()->with($notification);

                }
        

     }


     public function ViewAttendance($edit_date)
     {
         $date = DB::table('attendances')->where('edit_date',$edit_date)->first();
        $data = DB::table('attendances')->join('employees','attendances.user_id','employees.id')->select('employees.name','employees.photo','attendances.*')->where('edit_date',$edit_date)->get();
        return view('view_attendance',compact('data','date'));

     }





    
    

        
     

     
  }

