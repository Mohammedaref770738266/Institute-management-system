<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\TermCourseController;
use App\Models\Teacher;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::resource('books',BookController::class);

Route::resource('students',StudentController::class);

Route::resource('teachers',TeacherController::class);

Route::resource('departments',DepartmentController::class);

Route::resource('books',BookController::class);

Route::resource('periods',PeriodController::class);

Route::resource('halls',HallController::class);

Route::resource('terms',TermController::class);

Route::resource('courses',CourseController::class);

Route::resource('term_courses',TermCourseController::class);
