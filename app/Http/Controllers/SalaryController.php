<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SalaryController extends Controller
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

    public function AddAdvancedSalary()
    {
        return view('advanced_salary');
    }
    public function AllSalary()
    {
        $salary = DB::table('advance_salaries')
                ->join('employees','advance_salaries.emp_id','employees.id')
                ->select('advance_salaries.*','employees.name','employees.salary')
                ->orderBy('id','DESC')
                ->get();


          // echo "<pre>";
          // print_r($salary);
          // exit();      


        return view('all_advanced_salary',compact('salary'));
    }
    public function InsertAdvanced(Request $request)
    {
        $month = $request->month;
        $emp_id = $request->emp_id;


        // echo "$emp_id";
        $advanced = DB::table('advance_salaries')->get()
                            ->where('month',$month)
                            ->where('emp_id',$emp_id)
                            ->first();

        if ($advanced === NULL) {
        $data = array();
        $data['emp_id'] = $request->emp_id;
        $data['month'] = $request->month;
        $data['advanced_salary'] = $request->advanced_salary;
        $data['year'] = $request->year;

        // echo "<pre>";
        // print_r($data);
        // exit();
        $advanced = DB::table('advance_salaries')->insert($data);

        if($advanced){
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
        }else{
            $notification = array(
                        'messege'=>'Error', 
                        'alert-type'=>'success'
                    );
                   return Redirect()->back()->with($notification);

        }

        //  echo "<pre>";
        // print_r($advanced);
        // exit();






        




    }


    public function PaySalary()
    {
        

        //   echo "<pre>";
        // print_r($salary);
        // exit();


        $employee = DB::table('employees')->get();


         return view('pay_salary',compact('employee'));

    }



}
