<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class Courses extends Controller
{
    public function index()
    {
        $this->data['courses'] = Course::all();
        return view('frontend.course.index', $this->data);
    }
}
