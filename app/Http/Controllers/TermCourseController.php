<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Course;
use App\Models\Department;
use App\Models\Hall;
use App\Models\Period;
use App\Models\Teacher;
use App\Models\Term;
use Illuminate\Support\Facades\DB;
use App\Models\term_Course;
use App\Models\TermCourse;
use App\Http\Requests\Storeterm_CourseRequest;
use App\Http\Requests\Updateterm_CourseRequest;
use Illuminate\Support\Facades\URL;
use Illuminate\http\Request;
class TermCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = DB::table('courses')->get(['id','name']);
        $term_courses = term_Course::paginate(25);
        return view('term_course.index', compact('term_courses','courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $courses= Course::all();
        $teachers= Teacher::all();
        $halls= Hall::all();
        $periods= Period::all();
        return view('term_course.create',compact(['courses','teachers','halls','periods']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storeterm_CourseRequest $request)
    {
        $term = DB::table('terms')->get()->last();
        term_Course::create([
            'term_id'=>$term->id,
            'course_id'=>$request->course_id,
            'teacher_id'=>$request->teacher_id,
            'period_id'=>$request->period_id,
            'hall_id'=>$request->hall_id,
            'price'=>$request->price,
            'maxmum_num'=>$request->maxmum_num,
            'minimum_num'=>$request->minimum_num,
        ]);
        toastr()->success('Added Successfully');
        return redirect(route('term_courses.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(term_Course $term_Course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(term_Course $term_Course)
    {
//        $url = (string)URL::current();
//        $url = preg_split('/\//',$url);
//        $url = (int)array_slice($url, -2, 1)[0];
//        $term_Course = db::table('term__courses')->get()->where('id', $url);
//        return dd($term_Course);
        $courses= Course::all();
        $teachers= Teacher::all();
        $halls= Hall::all();
        $periods= Period::all();
        return view('term_course.edit',compact(['term_Course','courses','teachers','halls','periods']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updateterm_CourseRequest $request, term_Course $term_Course)
    {
        $term_Course->update([
//            'course_id'=>$request->course_id,
//            'teacher_id'=>$request->teacher_id,
//            'period_id'=>$request->period_id,
//            'hall_id'=>$request->hall_id,
//            'price'=>$request->price,
//            'maxmum_num'=>$request->maxmum_num,
//            'minimum_num'=>$request->minimum_num,
        ]);
        toastr()->success('Updated Successfully');
        return redirect(route('term_courses.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(term_Course $term_Course)
    {
        $term_Course->delete();
        toastr()->success("Deleted Successfully");
        return redirect(route('term_courses.index'));
    }
}
