<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use App\Models\FurloughRequests;
use Illuminate\Http\Request;

class FurloughController extends Controller
{
    public function index(){
        $requests = auth()->user()->employee->furloughRequests;
        return view('jobhive.employee.pages.furlough-management.index', compact('requests'));
    }

    public function create(){
       $request = new FurloughRequests();
         $request->title = request('title');
         $request->comments = request('comments');
         $request->start_date = request('start_date');
         $request->end_date = request('end_date');
         $request->employee_id = auth()->user()->employee->id;
         $request->employer_email = request('email');
         $request->save();
         return redirect()->back();
    }
}
