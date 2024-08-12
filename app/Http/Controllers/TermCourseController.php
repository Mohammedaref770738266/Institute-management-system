<?php

namespace App\Http\Controllers;

//use App\Models\Course;
//use App\Models\Hall;
//use App\Models\Period;
//use App\Models\Teacher;
use App\Models\Course;
use App\Models\Term;
use App\Models\term_Course;
use App\Models\TermCourse;
use App\Http\Requests\Storeterm_CourseRequest;
use App\Http\Requests\Updateterm_CourseRequest;
use Illuminate\http\Request;
class TermCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $term_courses = term_Course::paginate(25);
        return view('term_course.index', compact('term_courses'));
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
    public function store(Storeterm_CourseRequest $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updateterm_CourseRequest $request, term_Course $term_Course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(term_Course $term_Course)
    {
    }
}
