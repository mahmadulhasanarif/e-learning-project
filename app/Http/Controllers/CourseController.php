<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $this->data['courses'] = Course::all();
        $this->data['message'] = session::get('message');
        
        return view('admin.courses.course', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['categories'] = Category::all();
        return view('admin.courses.create', $this->data);
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
        
        if ($request->file('photo')){
            $this->data['photo'] = Storage::putFile('/images', $request->file('photo'));
        }
        Course::create($this->data);
        
        Session::flash('message', 'Data Added Successfully');
        
        return redirect()->to('/course');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $this->data['categories'] = Category::all();
        $this->data['courses'] = $course;
        if($course->photo){
            $this->data['courses']->photo=Storage::url($course->photo);
        }
        
        return view('admin.courses.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $this->data['course'] = $course;
        
        if($course->photo){
            $this->data['course']->photo=Storage::url($course->photo);
        }
        
        $this->data['categories'] = Category::all();
        return view('admin.courses.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $this->data = $request->all();
        
        $course->title = $this->data['title'];
        $course->description = $this->data['description'];
        $course->category_id = $this->data['category_id'];
        
        if($request->file('photo')){
            if ($course->photo) {
                Storage::delete($course->photo);
            }
            $course->photo = Storage::putFile('/images', $request->file('photo'));
        }
        
        $course->save();
        
        Session::flash('message', 'Data updated Successfully');
        
        
        
        return redirect()->to('/course');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        Session::flash('message', 'Data Deleted successfully');
        if ($course->photo) {
            Storage::delete($course->photo);
        }
        
        return redirect()->to('/course');
    }
}
