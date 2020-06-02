<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Offert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OffertController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function index()
    {
        $offerts = Offert::where('em_id','=',Auth::user()->id)->orderBy('id','DESC')->paginate(20);
        return view('admin.offert.index',compact('offerts'));
    }
    public function allOffert(){
        $offerts = Offert::orderBy('id','DESC')->paginate(20);
        $offert_waiting_for_client_feedback = Offert::sum('waiting_for_clients_feedback');
        $offert_value = Offert::sum('offert_value');
        return view('admin.offert.all_offert',compact('offerts','offert_waiting_for_client_feedback','offert_value'));
    }
    public function create()
    {
        return view('admin.offert.create');
    }
    public function store(Request $request)
    {
        Offert::create([
           'em_id' => Auth::user()->id,
           'em_name' => Auth::user()->name,
           'department' => Auth::user()->account_for,
           'date' => $request->date,
           'sent_offert' => $request->sent_offert,
           'waiting_for_clients_feedback' => $request->waiting_for_clients_feedback,
           'offert_value' => $request->offert_value,
           'to_close_deals' => $request->to_close_deals,
        ]);
        Session::flash('success','Offert Created Successfully');
        return redirect()->route('offert.index');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
       $edit = Offert::find($id);
       return view('admin.offert.offert_edit',compact('edit'));
    }
    public function update(Request $request, $id)
    {
        $update = Offert::find($id);
        $update->update([
            'date' => $request->date,
            'sent_offert' => $request->sent_offert,
            'waiting_for_clients_feedback' => $request->waiting_for_clients_feedback,
            'offert_value' => $request->offert_value,
            'to_close_deals' => $request->to_close_deals,
        ]);
        Session::flash('success','Offert Updated Successfully');
        return redirect()->route('offert.index');
    }
    public function destroy($id)
    {
        $delete = Offert::find($id);
        $delete->delete();
        Session::flash('success','Offert Deleted Successfully');
        return redirect()->route('offert.index');
    }
    public function offertApply(Request $request){
        if(($request->department) && !($request->em_id)){
            $offerts = Offert::where('department','=',$request->department)->orderBy('id','DESC')->paginate(20);
        }elseif (($request->department) && ($request->em_id)){
            $offerts = Offert::where('department','=',$request->department)->where('em_id','=',$request->em_id)->orderBy('id','DESC')->paginate(20);
        }else{
            $offerts = Offert::orderBy('id','DESC')->paginate(20);
        }
        return view('admin.offert.all_offert',compact('offerts'));
    }
}
