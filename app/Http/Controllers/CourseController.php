<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Department;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses= Course::paginate(25);
        return view('course.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments= Department::all();
        $books= Book::all();
        return view('course.create',compact(['departments','books']));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        $last_order_department = DB::table('courses')->where('department_id', $request->department_id)->first();
        if($last_order_department){
            Course::create([
                'name'=>$request->name,
                'price'=>$request->price,
                'description'=>$request->description,
                'department_id'=>$request->department_id,
                'book_id'=>$request->book_id,
                'story_id'=>$request->story_id,
                'order'=>$last_order_department->order+1
            ]);
        }
        else
            Course::create([
                'name'=>$request->name,
                'price'=>$request->price,
                'description'=>$request->description,
                'department_id'=>$request->department_id,
                'book_id'=>$request->book_id,
                'story_id'=>$request->story_id,
                'order'=>1
            ]);
        toastr()->success('Added Successfully');
        return redirect(route('courses.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $departments= Department::all();
        $books= Book::all();
        return view('course.edit',compact(['course','departments','books']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
//        return dd($id = \Auth::id());
        $id = \Auth::id();
        $before_order_department = DB::table('courses')->where('id', $request->id)->first();

        if ($request->department_id == $id)
        {
            $course->update([
                'name'=>$request->name,
                'price'=>$request->price,
                'description'=>$request->description,
                'department_id'=>$request->department_id,
                'book_id'=>$request->book_id,
                'story_id'=>$request->story_id
            ]);
        }
        elseif ($course->department_id != $before_order_department->id)
        {
            $last_order_department = DB::table('courses')->where('department_id', $request->department_id)->first();
            if($last_order_department)
            {
                $course->update([
                    'name'=>$request->name,
                    'price'=>$request->price,
                    'description'=>$request->description,
                    'department_id'=>$request->department_id,
                    'book_id'=>$request->book_id,
                    'story_id'=>$request->story_id,
                    'order'=>$last_order_department->order+1
                ]);
            }
            else
                $course->update([
                    'name'=>$request->name,
                    'price'=>$request->price,
                    'description'=>$request->description,
                    'department_id'=>$request->department_id,
                    'book_id'=>$request->book_id,
                    'story_id'=>$request->story_id,
                    'order'=>1
                ]);
        }
        toastr()->success('Updated Successfully');
        return redirect(route('courses.index'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        toastr()->success("Deleted Successfully");
        return redirect(route('courses.index'));
    }
}
