<?php

namespace App\Http\Controllers\employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentsManagementController extends Controller
{
    public function index(){
        return view('jobhive.employer.pages.manage-documents.index');
    }

    public function addDocuments(Request $request){
        $company = auth()->user()->employer->company;
        if ($request->file('documents')){
            foreach($request->file('documents') as $file){
                $name = $file->getClientOriginalName();
                $file->move(public_path(). '/documents/'.str_replace(' ', '',auth()->user()->name) . '/' , $name);
                $data[] = $name;
            }
            $company->documents = json_encode($data);
        };
        $company->save();
        return redirect()->back();
    }
}
