<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function show(Lesson $lesson)
    {
        $this->data['course'] = $lesson->Course;
        $this->data['lesson'] = $lesson;
        return view('frontend.lesson.details', $this->data);
    }
}
