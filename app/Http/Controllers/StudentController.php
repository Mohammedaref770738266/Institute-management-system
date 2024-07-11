<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::paginate(25);
        return view('student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        Student::create([
            'full_name_ar'=>$request->name_ar,
            'full_name_en'=>$request->name_en,
            'address'=>$request->address,
            'phone_number'=>$request->phone,
            'gender'=>$request->gender,
            'birth_place'=>$request->birth_p,
            'birth_day'=>$request->birth_d,
            'parent_name'=>$request->parent_name,
            'relative' => $request->relative,
            'parent_phone'=>$request->parent_phone,
        ]);
        toastr()->success("Added successfully");
        return redirect(route('students.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
//        return dd($student);
        return view('student.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update([
            'full_name_ar'=>$request->name_ar,
            'full_name_en'=>$request->name_en,
            'address'=>$request->address,
            'phone_number'=>$request->phone,
            'gender'=>$request->gender,
            'birth_place'=>$request->birth_p,
            'birth_day'=>$request->birth_d,
            'parent_name'=>$request->parent_name,
            'relative' => $request->relative,
            'parent_phone'=>$request->parent_phone,
        ]);
        toastr()->success("Updated successfully");
        return redirect(route('students.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        toastr()->success("Deleted Successfully");
        return redirect(route('students.index'));
    }
}
