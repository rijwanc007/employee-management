<?php

namespace App\Http\Controllers\Admin;

use App\Address;
use App\Document;
use App\Http\Controllers\Controller;
use App\Relative;
use App\Role;
use App\Services;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LeaderController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function index()
    {
        $leaders = User::where('account_for','=','sale_leader')->paginate(20);
        return view('admin.leader.index',compact('leaders'));
    }
    public function create()
    {
        $roles =Role::all();
        return view('admin.leader.leader_create',compact('roles'));
    }
    public function store(Request $request)
    {
        if($request->password != $request->confirm_password){
            $request->validate([
                'password' => 'confirmed',
            ]);
        }
        $request->validate([
            'document' => 'required',
            'document.*' => 'mimes:jpg,jpeg,png,gif,pdf',
            'email' => 'unique:users',
        ]);
        $user_image = $request->file('image');
        $user_image_name = rand().'.'.$user_image->getClientOriginalExtension();
        $user_image->move(public_path().'/assets/images/user/',$user_image_name);
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'name' => $request->first_name.' '.$request->last_name,
            'image' => $user_image_name,
            'status' => 'checked',
            'account_for' => $request->account_for,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'private_email' => $request->private_email,
            'phone' => $request->phone,
            'phone_evening' => $request->phone_evening,
            'designation' => $request->designation,
            'work_space' => $request->work_space,
            'nearest_chief' => $request->nearest_chief,
            'social_security_number' => $request->social_security_number,
            'contract_start' => $request->contract_start,
            'contract_end' => $request->contract_end,
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'clearing_number' => $request->clearing_number,
            'table_tax' => $request->table_tax,
        ]);
        $user->address()->create([
            'address_one' => $request->address_one,
            'state' => $request->state,
            'address_two' => $request->address_two,
            'post_code' => $request->post_code,
            'city' => $request->city
        ]);
        $user->relative()->create([
            'relative_name' => $request->relative_name,
            'relative_phone' => $request->relative_phone,
            'relation' => $request->relation,
        ]);
        foreach($request->file('document') as $image)
        {
            $name = rand().'.'.$image->getClientOriginalExtension();
            $image->move(public_path().'/assets/images/document/', $name);
            $data[] = $name;
        }
        $user->document()->create([
            'document' => json_encode($data),
        ]);
        $user->roles()->sync($request->role);
        Session::flash('success','Sale Leader Created Successfully');
        return redirect()->route('sale_leader.index');
    }
    public function show($id)
    {
        $details = User::find($id);
        $address_details = Address::where('user_id','=',$id)->first();
        $relative_details = Relative::where('user_id','=',$id)->first();
        $document_details = Document::where('user_id','=',$id)->first();
        $service_details = Services::where('user_id','=',$id)->first();
        return view('admin.leader.leader_show',compact('details','address_details','relative_details','document_details','service_details'));
    }
    public function edit($id)
    {
        $edit = User::find($id);
        $edit_address = Address::where('user_id','=',$id)->first();
        $edit_relative = Relative::where('user_id','=',$id)->first();
        $edit_document = Document::where('user_id','=',$id)->first();
        return view('admin.leader.leader_edit',compact('edit','edit_address','edit_relative','edit_document'));
    }
    public function update(Request $request, $id)
    {
        $update = User::find($id);
        $document = Document::where('user_id','=',$update->id)->first();
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
        if(!empty($request->image)){
            $user_image = $request->file('image');
            $user_image_name = rand().'.'.$user_image->getClientOriginalExtension();
            $user_image->move(public_path().'/assets/images/user/',$user_image_name);
            $update->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'name' => $request->first_name.' '.$request->last_name,
                'image' => $user_image_name,
                'account_for' => $request->account_for,
                'email' => $request->email,
                'private_email' => $request->private_email,
                'phone' => $request->phone,
                'phone_evening' => $request->phone_evening,
                'designation' => $request->designation,
                'work_space' => $request->work_space,
                'nearest_chief' => $request->nearest_chief,
                'social_security_number' => $request->social_security_number,
                'contract_start' => $request->contract_start,
                'contract_end' => $request->contract_end,
                'bank_name' => $request->bank_name,
                'account_number' => $request->account_number,
                'clearing_number' => $request->clearing_number,
                'table_tax' => $request->table_tax,
            ]);
            $address_update = Address::where('user_id','=',$id)->first();
            $address_update->update([
                'address_one' => $request->address_one,
                'state' => $request->state,
                'address_two' => $request->address_two,
                'post_code' => $request->post_code,
                'city' => $request->city
            ]);
            $relative_update = Relative::where('user_id','=',$id)->first();
            $relative_update->update([
                'relative_name' => $request->relative_name,
                'relative_phone' => $request->relative_phone,
                'relation' => $request->relation,
            ]);
            //            if previous_document exits maybe document field exists then go if condition
            if(($request->previous_document)){
                $u_p_d = $request->previous_document;
                $t_p_d = json_decode($document->document);
//                if any field are deleted then find the delete field then prepare new previous document field array
//                  delete delete field document in public folder
//                if no previous field are deleted then its not working
                $diff_d = array_diff($t_p_d,$u_p_d);
                if(!empty($diff_d)){
                    foreach ($diff_d as $key => $d){
                        unlink('assets/images/document/'.$d);
                    }
                }
//                now user add new document then store the new document in public folder
//                then merge previous documnet and new document in $result variable
                if($request->document != null){
                    foreach($request->file('document') as $image)
                    {
                        $name = rand().'.'.$image->getClientOriginalExtension();
                        $image->move(public_path().'/assets/images/document/', $name);
                        $data[] = $name;
                    }
                    $f_p_d = $request->previous_document;
                    $u_d = $data;
                    $result = array_merge($f_p_d, $u_d);
                }else{
//                    if no new document then only store previous document
                    $result = $request->previous_document;
                }
                $document_update = Document::where('user_id','=',$id)->first();
                $document_update->update([
                    'document' => json_encode($result)
                ]);
            }elseif (!($request->previous_document) && ($request->document)){
//                document delete in document board also store document these elseif works for that
                if($request->document != null){
                    foreach($request->file('document') as $image)
                    {
                        $name = rand().'.'.$image->getClientOriginalExtension();
                        $image->move(public_path().'/assets/images/document/', $name);
                        $data[] = $name;
                    }
                    Document::create([
                        'user_id' => $id,
                        'document' => json_encode($data)
                    ]);
                }
            }
        }else{
            $update->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'name' => $request->first_name.' '.$request->last_name,
                'account_for' => $request->account_for,
                'email' => $request->email,
                'private_email' => $request->private_email,
                'phone' => $request->phone,
                'phone_evening' => $request->phone_evening,
                'designation' => $request->designation,
                'work_space' => $request->work_space,
                'nearest_chief' => $request->nearest_chief,
                'social_security_number' => $request->social_security_number,
                'contract_start' => $request->contract_start,
                'contract_end' => $request->contract_end,
                'bank_name' => $request->bank_name,
                'account_number' => $request->account_number,
                'clearing_number' => $request->clearing_number,
                'table_tax' => $request->table_tax,
            ]);
            $address_update = Address::where('user_id','=',$id)->first();
            $address_update->update([
                'address_one' => $request->address_one,
                'state' => $request->state,
                'address_two' => $request->address_two,
                'post_code' => $request->post_code,
                'city' => $request->city
            ]);
            $relative_update = Relative::where('user_id','=',$id)->first();
            $relative_update->update([
                'relative_name' => $request->relative_name,
                'relative_phone' => $request->relative_phone,
                'relation' => $request->relation,
            ]);
            //            if previous_document exits maybe document field exists then go if condition
            if(($request->previous_document)){
                $u_p_d = $request->previous_document;
                $t_p_d = json_decode($document->document);
//                if any field are deleted then find the delete field then prepare new previous document field array
//                  delete delete field document in public folder
//                if no previous field are deleted then its not working
                $diff_d = array_diff($t_p_d,$u_p_d);
                if(!empty($diff_d)){
                    foreach ($diff_d as $key => $d){
                        unlink('assets/images/document/'.$d);
                    }
                }
//                now user add new document then store the new document in public folder
//                then merge previous documnet and new document in $result variable
                if($request->document != null){
                    foreach($request->file('document') as $image)
                    {
                        $name = rand().'.'.$image->getClientOriginalExtension();
                        $image->move(public_path().'/assets/images/document/', $name);
                        $data[] = $name;
                    }
                    $f_p_d = $request->previous_document;
                    $u_d = $data;
                    $result = array_merge($f_p_d, $u_d);
                }else{
//                    if no new document then only store previous document
                    $result = $request->previous_document;
                }
                $document_update = Document::where('user_id','=',$id)->first();
                $document_update->update([
                    'document' => json_encode($result)
                ]);
            }elseif (!($request->previous_document) && ($request->document)){
//                document delete in document board also store document these elseif works for that
                if($request->document != null){
                    foreach($request->file('document') as $image)
                    {
                        $name = rand().'.'.$image->getClientOriginalExtension();
                        $image->move(public_path().'/assets/images/document/', $name);
                        $data[] = $name;
                    }
                    Document::create([
                        'user_id' => $id,
                        'document' => json_encode($data)
                    ]);
                }
            }
        }
        Session::flash('success','Updated Successfully');
        return redirect()->route('sale_leader.index');
    }
    public function destroy($id)
    {
        $delete = User::find($id);
        $address_delete = Address::where('user_id','=',$delete->id)->first();
        $document_delete = Document::where('user_id','=',$delete->id)->first();
        $service_delete = Services::where('user_id','=',$delete->id)->first();
        if(!empty($address_delete)){
            $address_delete->delete();
        }
        if(!empty($document_delete)){
            $document = explode(',',str_replace(str_split('[]""'),'',$document_delete->document));
            for($i = 0;$i < count(json_decode($document_delete->document),COUNT_NORMAL);$i++){
                unlink('assets/images/document/'.$document[$i]);
            }
            $document_delete->delete();
        }
        unlink('assets/images/user/'.$delete->image);
        $delete->delete();
        if(!empty($service_delete)){
            $service_delete->delete();
        }
        Session::flash('success','Deleted Successfully');
        return redirect()->route('sale_leader.index');
    }
}
