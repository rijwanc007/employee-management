<?php

namespace App\Http\Controllers\Admin;

use App\Document;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DocumentController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function index()
    {
        $documents = Document::orderBy('id','DESC')->paginate(20);
        return view('admin.document.index',compact('documents'));
    }
    public function documentApply(Request $request){
        if(($request->department) && ($request->em_id)){
            $documents = Document::where('user_id','=',$request->em_id)->orderBy('id','DESC')->paginate(20);
        }else{
            $documents = Document::orderBy('id','DESC')->paginate(20);
        }
        return view('admin.document.index',compact('documents'));
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
        $document_delete = Document::find($id);
        $document = explode(',',str_replace(str_split('[]""'),'',$document_delete->document));
        for($i = 0;$i < count(json_decode($document_delete->document),COUNT_NORMAL);$i++){
            unlink('assets/images/document/'.$document[$i]);
        }
        $document_delete->delete();
        Session::flash('success','Document Deleted Successfully');
        return redirect('document');
    }
}
