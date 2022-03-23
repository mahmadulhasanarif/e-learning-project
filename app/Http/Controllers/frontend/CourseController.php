<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $this->data['courses'] = Course::all();
        return view('frontend.course.index', $this->data);
    }
    
    public function show(Course $course)
    {
        $this->data['course'] = $course;
        // $lessions = Lesson::where('course_id', $course->id)->get();
        // dd($lessions);
        return view('frontend.course.details', $this->data);
    }
}
