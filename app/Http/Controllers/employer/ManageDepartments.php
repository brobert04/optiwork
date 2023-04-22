<?php

namespace App\Http\Controllers\employer;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class ManageDepartments extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $departments = Department::where('company_id', auth()->user()->employer->company->id)->get();
        return view('jobhive.employer.pages.manage-departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $department = new Department();
        $department->name = $request->name;

        $department->company_id = auth()->user()->employer->company->id;

        $department->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
