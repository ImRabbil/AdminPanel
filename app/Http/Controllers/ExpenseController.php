<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ExpenseController extends Controller
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
    public function AddExpense()
    {
        return view('admin.add_expense');
    }
    public function InsertExpense(Request $request)
    {
        $data = array();
        $data['details']=$request->details;
        $data['amount']=$request->amount;
        $data['date']=$request->date;
       $data['month']=$request->month;
       $data['year']=$request->year;
    

        $exp = DB::table('expenses')->insert($data);
                if($exp){
                    $notification = array(
                        'messege'=>'Succesfully Advanced Paid',
                         'alert-type'=>'success'
                    );
                    return Redirect()->route('today.expense')->with($notification);
                }else{
                   $notification = array(
                        'messege'=>'Error', 
                        'alert-type'=>'success'
                    );
                   return Redirect()->back()->with($notification);

                }

    }
    public function TodayExpense()

    {
        $date = date("d/m/y");
        $today = DB::table('expenses')->where('date',$date)->get();
        // echo "<pre>";
        // print_r($today);
        // exit();
        return view('today_expense',compact('today'));

    }
    public function EditTodayExpense($id)
    {
        $today = DB::table('expenses')->where('id',$id)->first();
        return view('edit_today_expense',compact('today'));

    }
    public function UpdateExpense(Request $request,$id)
    {
         $data = array();
        $data['details']=$request->details;
        $data['amount']=$request->amount;
        $data['date']=$request->date;
       $data['month']=$request->month;
       $data['year']=$request->year;
    

        $exp = DB::table('expenses')->where('id',$id)->update($data);
                if($exp){
                    $notification = array(
                        'messege'=>'Succesfully Advanced Paid',
                         'alert-type'=>'success'
                    );
                    return Redirect()->route('today.expense')->with($notification);
                }else{
                   $notification = array(
                        'messege'=>'Error', 
                        'alert-type'=>'success'
                    );
                   return Redirect()->back()->with($notification);

                }
    }
    public function MonthlyExpense()
    {
        $month = date("F");
        $expense = DB::table('expenses')->where('month',$month)->get();

        return view('monthly_expense',compact('expense'));
    }
    public function YearlyExpense()
    {
        $year = date("Y");
        $year = DB::table('expenses')->where('year',$year)->get();

        return view('yearly_expense',compact('year'));

    }

    public function JanuaryExpense()
    {
        $month = "January";
         $expense = DB::table('expenses')->where('month',$month)->get();

        return view('monthly_expense',compact('expense'));
        
    }
     public function OctoberExpense()
    {
        $month = "October";
         $expense = DB::table('expenses')->where('month',$month)->get();

        return view('monthly_expense',compact('expense'));
        
    }


}
