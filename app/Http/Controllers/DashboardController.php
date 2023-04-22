<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 0) {
            return view('jobhive.employee.dashboard');
        }elseif(auth()->user()->role == 1) {
            if(auth()->user()->employer->profile_completed==0){
                return view('jobhive.employer.pages.dashboard');
            }
            return view('jobhive.employer.pages.dashboard');
        }else{
            return view('jobhive.superadmin.index');
        }
    }
}
