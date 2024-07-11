<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::paginate(25);
        return view('teacher.index',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teacher.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request)
    {
//        return dd($request->all());
        Teacher::create([
            'full_name_ar'=>$request->name_ar,
            'full_name_en'=>$request->name_en,
            'address'=>$request->address,
            'phone_number'=>$request->phone,
            'birth_place'=>$request->birth_p,
            'birth_day'=>$request->birth_d,
            'qualification' => $request->qualification,
            'salary'=>$request->salary,
            'gender'=>$request->gender,
            'status'=>isset($request->status),
        ]);
        toastr()->success("Added successfully");
        return redirect(route('teachers.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        return view('teacher.edit',compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        $teacher->update([
            'full_name_ar'=>$request->name_ar,
            'full_name_en'=>$request->name_en,
            'address'=>$request->address,
            'phone_number'=>$request->phone,
            'gender'=>$request->gender,
            'birth_place'=>$request->birth_p,
            'birth_day'=>$request->birth_d,
            'qualification' => $request->qualification,
            'salary'=>$request->salary,
            'status'=>isset($request->status),
        ]);
        toastr()->success("Updated successfully");
        return redirect(route('teachers.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        toastr()->success("Deleted Successfully");
        return redirect(route('teachers.index'));
    }
}
