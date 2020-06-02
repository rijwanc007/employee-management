<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function index()
    {
        $roles = Role::where('status','=','admin')->orderBy('id','DESC')->paginate(24);
        return view('admin.role.index',compact('roles'));
    }
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.role.create',compact('permissions'));
    }
    public function store(Request $request)
    {
        $role = Role::create([
            'role_name' =>$request->role_name,
            'status' =>'admin'
        ]);
        Session::flash('success','Role Created Successfully');
        $role->permissions()->sync($request->permission);
        return redirect()->route('role.index');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $role = Role::find($id)->permissions;
        $role_data = Role::find($id);
        $permissions = Permission::all();
        return view('admin.role.edit',compact('role','role_data','permissions'));
    }
    public function update(Request $request, $id)
    {
        $permission_update = Role::find($id);
        $permission_update->update([
            'role_name' =>$request->role_name
        ]);
        $permission_update->permissions()->sync($request->permission);
        Session::flash('success','Role Updated Successfully');
        return redirect()->route('role.index');
    }
    public function destroy($id)
    {
        $role_user = DB::table('role_user')->where('role_id','=',$id);
        $role_user->delete();
        $permission_role = DB::table('permission_role')->where('role_id','=',$id);
        $permission_role->delete();
        $delete_role = Role::find($id);
        $delete_role->delete();
        Session::flash('success','Role Deleted Successfully');
        return redirect('role.index');
    }
}
