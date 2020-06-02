<?php

namespace App\Http\Controllers\Admin;

use App\Attendance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AttendanceController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function index()
    {
        //
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $check = Attendance::where('date','=',$request->date)->where('em_id','=',$request->em_id)->first();
        $duplicate = Attendance::where('date','=',$request->date)->where('em_id','=',$request->em_id)->first();
        if(empty($check)){
            if(!empty($request->file('file'))){
                $file = $request->file('file');
                $file_name = rand().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/assets/images/attendance_document/',$file_name);
                Attendance::create([
                    'em_id' => Auth::user()->id,
                    'em_name' => Auth::user()->name,
                    'em_email' => Auth::user()->email,
                    'department' => Auth::user()->account_for,
                    'date' => $request->date,
                    'start' => $request->start,
                    'lunch' => $request->lunch,
                    'end' => $request->end,
                    'total_hour' => $request->total_hour,
                    'sick' => $request->sick,
                    'leave' => $request->leave,
                    'file' => $file_name,
                    'comment' => $request->comment,
                ]);
            }else{
                Attendance::create([
                    'em_id' => Auth::user()->id,
                    'em_name' => Auth::user()->name,
                    'em_email' => Auth::user()->email,
                    'department' => Auth::user()->account_for,
                    'date' => $request->date,
                    'start' => $request->start,
                    'lunch' => $request->lunch,
                    'end' => $request->end,
                    'total_hour' => $request->total_hour,
                    'sick' => $request->sick,
                    'leave' => $request->leave,
                    'comment' => $request->comment,
                ]);
            }
            Session::flash('success','Attendance Created Successfully');
        }else{
            if(!empty($request->file('file'))){
                $file = $request->file('file');
                $file_name = rand().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/assets/images/attendance_document/',$file_name);
                $check->update([
                    'date' => $request->date,
                    'start' => $request->start,
                    'lunch' => $request->lunch,
                    'end' => $request->end,
                    'total_hour' => $request->total_hour,
                    'sick' => $request->sick,
                    'leave' => $request->leave,
                    'file' => $file_name,
                    'comment' => $request->comment,
                ]);
                unlink('assets/images/attendance_document/'.$duplicate->file);
            }else{
                $check->update([
                    'date' => $request->date,
                    'start' => $request->start,
                    'lunch' => $request->lunch,
                    'end' => $request->end,
                    'total_hour' => $request->total_hour,
                    'sick' => $request->sick,
                    'leave' => $request->leave,
                    'comment' => $request->comment,
                ]);
            }
            Session::flash('success','Attendance Updated Successfully');
        }
       return redirect()->route('home');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
    public function attendanceApply(Request $request){
        $find = Attendance::where('date','=',$request->formData['date'])->where('em_id','=',$request->formData['em_id'])->first();
        if(!empty($find)){
            $data = $find;
        }else{
            $data = 0;
        }
        return response()->json($data);
    }
}
