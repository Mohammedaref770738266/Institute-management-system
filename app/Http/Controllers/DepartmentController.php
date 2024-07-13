<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments= Department::paginate(25);
        return view('department.index',compact('departments'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request)
    {
        Department::create([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);
        toastr()->success('Added Successfully');
        return redirect(route('departments.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('department.edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $department->update([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);
        toastr()->success('Updated Successfully');
        return redirect(route('departments.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {

        $department->delete();
        toastr()->success("Deleted Successfully");
        return redirect(route('departments.index'));
    }
}
