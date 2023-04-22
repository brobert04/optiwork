<?php

namespace App\Http\Controllers\employer;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\employer\CreateEmployerRequest;

class ManageEmployees extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = auth()->user()->employer->employees;
        return view('jobhive.employer.pages.manage-employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = auth()->user()->employer->company->departments;
        return view('jobhive.employer.pages.manage-employees.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateEmployerRequest $request)
    {
         $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => ''
        ]);

        $employee = new Employee();
        $employee->user_id = $user->id;
        $employee->employer_id = auth()->user()->employer->id;
        $employee->department = $request->department;
        $employee->company = $request->company;
        $employee->gender = $request->gender;
        $employee->phone = $request->phone;
        $employee->save();

        return redirect()->route('employees.index');    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $departments = auth()->user()->employer->company->departments;
        $employee=Employee::findOrFail($id);
        return view('jobhive.employer.pages.manage-employees.update')->with(['employee'=>$employee,'departments'=>$departments]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,
            [
                'email'=>'unique:users,email,'.$id,
            ],
            [
                'email.unique'=>'This email already exists'
            ]
        );

        $user=User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->save();

        $user->employee->department=$request->department;
        $user->employee->company=$request->company;
        $user->employee->phone = $request->phone;
        $user->employee->gender = $request->gender;
        $user->employee->save();

        return redirect()->route('employees.index');    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('employees.index');
    }
}
