<?php

namespace App\Http\Controllers\employer;

use App\Http\Controllers\Controller;
use App\Models\FurloughRequests;
use Illuminate\Http\Request;

class ManageFurloughsRequests extends Controller
{
    public function index(){
        $requests = FurloughRequests::where('employer_email', auth()->user()->email)->get();
        return view('jobhive.employer.pages.manage-furloughs-requests.index', compact('requests'));
    }

    public function accept($id){
        $request = FurloughRequests::find($id);
        $request->status = 1;
        $request->save();
        return redirect()->back();
    }

    public function deny($id){
        $request = FurloughRequests::find($id);
        $request->status = 2;
        $request->save();
        return redirect()->back();
    }
}


