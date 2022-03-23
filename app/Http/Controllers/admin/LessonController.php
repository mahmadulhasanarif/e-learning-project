<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['lessons'] = Lesson::all();
        return view('admin.lessons.lesson', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['lesson'] = Lesson::all();
        $this->data['courses'] = Course::all();
        return view('admin.lessons.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->data = $request->all();
        Lesson::create($this->data);
        Session::flash('message', 'Data Added Successfully');
        return redirect()->to('admin/lesson');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        $this->data['lessons'] = $lesson;
        $this->data['courses'] = $lesson->course();
        return view('admin.lessons.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        $this->data['courses'] = Course::all();
        $this->data['lesson'] = $lesson;
        return view('admin.lessons.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        $data = $request->all();
        $lesson->title = $data['title'];
        $lesson->video_url = $data['video_url'];
        $lesson->description = $data['description'];
        $lesson->course_id = $data['course_id'];
        $lesson->save();
        Session::flash('message', 'Data Updated Successfully');
        return redirect()->to('admin/lesson/'.$lesson->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        Session::flash('message', 'Data Deleted Successfully');
        return redirect()->to('admin/lesson');
    }
}
