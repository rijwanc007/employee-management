<?php

namespace App\Http\Controllers\Admin;

use App\Address;
use App\Document;
use App\Http\Controllers\Controller;
use App\Relative;
use App\Services;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
       $users = User::where('account_for','!=','admin')->orderBy('id','DESC')->paginate(20);
       return view('admin.user.index',compact('users'));
    }
    public function selectRoleApply(Request $request){
        $users = User::where('account_for','=',$request->select_role)->orderBy('id','DESC')->paginate(20);
        return view('admin.user.index',compact('users'));
    }
    public function changeStatus(Request $request)
    {
        $user = User::find($request->user_id);
        $user->update([
            'status' => $request->status
        ]);
        return response()->json();
    }
    public function create()
    {
        return view('admin.user.create');
    }
    public function store(Request $request){

    }
    public function show($id)
    {
        $details = User::find($id);
        return view('admin.user.show',compact('details'));
    }
    public function edit($id)
    {
       $edit = User::find($id);
       return view('admin.user.edit',compact('edit'));
    }
    public function update(Request $request, $id)
    {
        $update = User::find($id);
        $d = User::find($id);
        $mail_unique = User::where('id','!=',$id)->where('email','=',$request->email)->first();
        if(empty($mail_unique)){
            $update->update([
                'email' => $request->email,
            ]);
        }else{
            $request->validate([
                'email' => 'unique:users',
            ]);
        }
        if(!empty($request->password)){
            if($request->password == $request->confirm_password){
                $update->update([
                    'password' => bcrypt($request->password),
                ]);
            }
            elseif($request->password != $request->confirm_password){
                $request->validate([
                    'password' => 'confirmed',
                ]);
            }
        }
        if(!empty($request->image)) {
            $image = $request->file('image');
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path() . '/assets/images/user/', $image_name);
            $update->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'name' => $request->first_name . ' ' . $request->last_name,
                'image' => $image_name,
                'email' => $request->email
            ]);
            unlink('assets/images/user/'.$d->image);
        }else{
            $update->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'name' => $request->first_name . ' ' . $request->last_name,
                'email' => $request->email
            ]);
        }
        Session::flash('success','profile updated successfully');
        return redirect()->back();
    }
    public function destroy($id)
    {

    }
}
