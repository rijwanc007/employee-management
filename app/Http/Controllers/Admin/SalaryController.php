<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Salary;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SalaryController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function index()
    {
        $salaries = Salary::orderBy('id','DESC')->paginate(20);
        return view('admin.salary.index',compact('salaries'));
    }
    public function salaryApprovedIndex(){
        $salaries = Salary::orderBy('id','DESC')->paginate(20);
        return view('admin.salary_approved.index',compact('salaries'));
    }
    public function approvedSalary(Request $request){
        $update = Salary::find($request->id);
        $update->update([
           'status' => 1
        ]);
        Session::flash('success','Salary Approved Successfully');
        return redirect()->route('salary.approved.index');
    }
    public function salaryApply(Request $request){
        if(($request->date) && !($request->department) && !($request->em_id)){
            $salaries = Salary::where('date','=',$request->date)->paginate(20);
        }elseif (($request->date) && ($request->department) && !($request->em_id)){
            $salaries = Salary::where('date','=',$request->date)->where('department','=',$request->department)->paginate(20);
        }elseif (($request->date) && ($request->department) && ($request->em_id)){
            $salaries = Salary::where('date','=',$request->date)->where('department','=',$request->department)->where('em_id','=',$request->em_id)->paginate(20);
        }elseif (!($request->date) && ($request->department) && !($request->em_id)){
            $salaries = Salary::where('department','=',$request->department)->paginate(20);
        }elseif (!($request->date) && ($request->department) && ($request->em_id)){
            $salaries = Salary::where('department','=',$request->department)->where('em_id','=',$request->em_id)->paginate(20);
        }else{
            $salaries = Salary::orderBy('id','DESC')->paginate(20);
        }
        return view('admin.salary.index',compact('salaries'));
    }
    public function salaryApprovedApply(Request $request){
        if(($request->date) && !($request->department) && !($request->em_id)){
            $salaries = Salary::where('date','=',$request->date)->paginate(20);
        }elseif (($request->date) && ($request->department) && !($request->em_id)){
            $salaries = Salary::where('date','=',$request->date)->where('department','=',$request->department)->paginate(20);
        }elseif (($request->date) && ($request->department) && ($request->em_id)){
            $salaries = Salary::where('date','=',$request->date)->where('department','=',$request->department)->where('em_id','=',$request->em_id)->paginate(20);
        }elseif (!($request->date) && ($request->department) && !($request->em_id)){
            $salaries = Salary::where('department','=',$request->department)->paginate(20);
        }elseif (!($request->date) && ($request->department) && ($request->em_id)){
            $salaries = Salary::where('department','=',$request->department)->where('em_id','=',$request->em_id)->paginate(20);
        }else{
            $salaries = Salary::orderBy('id','DESC')->paginate(20);
        }
        return view('admin.salary_approved.index',compact('salaries'));
    }
    public function create()
    {
        return view('admin.salary.create');
    }
    public function store(Request $request)
    {
        $check = Salary::where('date','=',$request->date)->where('department','=',$request->department)->where('em_name','=',$request->em_name)->first();
        if(empty($check)){
            $file = $request->file('pdf');
            $file_name = rand().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/assets/images/salary_document/',$file_name);
            $find = User::find($request->em_id);
            Salary::create([
                'em_id' =>$find->id,
                'date' => $request->date,
                'department' => $request->department,
                'em_name' => $find->name,
                'working_hours_from' => $request->working_hours_from,
                'salary_for' => $request->salary_for,
                'pdf' => $file_name,
                'status' => 0,
            ]);
            Session::flash('success','Salary Created Successfully');
            return redirect()->route('salary.index');
        }else{
            Session::flash('error','Salary Already Created');
            return redirect()->route('salary.create');
        }
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
       $edit = Salary::find($id);
       return view('admin.salary.salary_edit',compact('edit'));
    }
    public function update(Request $request, $id)
    {
        $update = Salary::find($id);
        $find = User::find($request->em_id);
        if(!empty($request->file)){
            $file = $request->file('pdf');
            $file_name = rand().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/assets/images/salary_document/',$file_name);
            $update->update([
                'em_id' =>$find->id,
                'date' => $request->date,
                'department' => $request->department,
                'em_name' => $find->name,
                'working_hours_from' => $request->working_hours_from,
                'salary_for' => $request->salary_for,
                'pdf' => $file_name,
            ]);
        }else{
            $update->update([
                'em_id' =>$find->id,
                'date' => $request->date,
                'department' => $request->department,
                'em_name' => $find->name,
                'working_hours_from' => $request->working_hours_from,
                'salary_for' => $request->salary_for,
            ]);
        }
        Session::flash('success','Salary Updated Successfully');
        return redirect()->route('salary.index');
    }
    public function destroy($id)
    {
        $delete = Salary::find($id);
        unlink('assets/images/salary_document/'.$delete->pdf);
        $delete->delete();
        Session::flash('success','Salary Deleted Successfully');
        return redirect()->route('salary.index');
    }
}
