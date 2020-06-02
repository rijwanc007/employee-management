<?php

namespace App\Http\Controllers\Admin;

use App\Attendance;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimeController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function index()
    {
        $attendances = Attendance::where('em_id','=',Auth::user()->id)->orderBy('id','DESC')->paginate(20);
        return view('admin.time.index',compact('attendances'));
    }
    public function allTimeReport(){
        $attendances = Attendance::orderBy('id','DESC')->paginate(20);
        return view('admin.time.all_time_report',compact('attendances'));
    }
    public function timeReportApply(Request $request){
        if(($request->start) && !($request->end)){
            $attendances = Attendance::where('em_id','=',$request->em_id)->where('date','=',$request->start)->paginate(20);
        }elseif (!($request->start) && ($request->end)){
            $attendances = Attendance::where('em_id','=',$request->em_id)->where('date','=',$request->end)->paginate(20);
        }elseif (($request->start) && ($request->end)){
            $attendances = Attendance::where('em_id','=',$request->em_id)->whereBetween('date', [$request->start, $request->end])->paginate(20);
        }else{
            $attendances = Attendance::where('em_id','=',$request->em_id)->orderBy('id','DESC')->paginate(20);
        }
    return view('admin.time.index',compact('attendances'));
    }
    public function allTimeReportApply(Request $request){
        if(($request->start) && !($request->end) && !($request->department) && !($request->em_id)){
            $attendances = Attendance::where('date','=',$request->start)->paginate(20);
            $total_hour = null;
        }elseif (($request->start) && ($request->end) && !($request->department) && !($request->em_id)){
            $attendances = Attendance::whereBetween('date', [$request->start, $request->end])->paginate(20);
            $total_hour = null;
        }elseif (($request->start) && ($request->end) && ($request->department) && !($request->em_id)){
            $attendances = Attendance::where('department','=',$request->department)->whereBetween('date', [$request->start, $request->end])->paginate(20);
            $total_hour = null;
        }elseif (($request->start) && ($request->end) && ($request->department) && ($request->em_id)){
            $attendances = Attendance::where('department','=',$request->department)->where('em_id','=',$request->em_id)->whereBetween('date', [$request->start, $request->end])->paginate(20);
            $total_hour = Attendance::where('department','=',$request->department)->where('em_id','=',$request->em_id)->whereBetween('date', [$request->start, $request->end])->sum('total_hour');
        }elseif (!($request->start) && ($request->end) && !($request->department) && !($request->em_id)){
            $attendances = Attendance::where('date','=',$request->end)->paginate(20);
            $total_hour = null;
        }elseif (!($request->start) && !($request->end) && ($request->department) && !($request->em_id)){
            $attendances = Attendance::where('department','=',$request->department)->paginate(20);
            $total_hour = null;
        }elseif (!($request->start) && !($request->end) && ($request->department) && ($request->em_id)){
            $attendances = Attendance::where('department','=',$request->department)->where('em_id','=',$request->em_id)->paginate(20);
            $total_hour = Attendance::where('em_id','=',$request->em_id)->sum('total_hour');
        }elseif (!($request->start) && !($request->end) && !($request->department) && ($request->em_id)){
            $attendances = Attendance::where('em_id','=',$request->em_id)->paginate(20);
            $total_hour = Attendance::where('em_id','=',$request->em_id)->sum('total_hour');
        }else{
            $attendances = Attendance::orderBy('id','DESC')->paginate(20);
            $total_hour = null;
        }
        return view('admin.time.all_time_report',compact('attendances','total_hour'));
    }
    public function departmentChange(Request $request){
        $user = User::where('account_for','=',$request->department)->get();
        return response()->json($user);
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
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
}
