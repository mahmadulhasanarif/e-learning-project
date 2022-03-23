@extends('admin.layout.layout')

@section('content')
<div style="border: 2px solid rgb(7, 238, 38)" class="container ">
    <div class="row clearfix">
        <div class="col-md-3">
            <h2><strong>Lesson Page</strong></h2>
        </div>
        <div class="col-md-7">
            <form action="{{url('admin/lesson/'. $lesson->id)}}" method="POST" enctype="multipart/form-data">
                
                @csrf 
                @method('PUT')
                
                <div style="float: right">
                    @error('name')
                    <small style="color: red">{{ $message }}</small>
                    @enderror
                   </div>
                <div class="mb">
                  <label>Lesson Title</label>
                  <input type="text" id="title" class="form-control @error ('title') is-invalid @enderror" value="{{old('title', $lesson->title)}}" name="title" aria-describedby="Name">
                </div>
                
                <div class="mb">
                    <label>Video URL</label>
                    <input type="text" id="video url" class="form-control @error ('video_url') is-invalid @enderror" value="{{old('video_url',$lesson->video_url)}}" name="video_url" aria-describedby="Name">
                </div>
                
                <label>Course Name</label>
                        <select name="course_id" class="form-control @error ('course_id') is-invalid @enderror" >
                            <option value="">select Course</option>
                            @foreach ($courses as $course)

                           <option value="{{$course->id}}" selected @if ($course->id = old('course_id', $lesson->course_id))
                               
                           @endif> {{$course->title}}</option>
                                                       
                           @endforeach
                           
                        </select>
                
                <div class="mb">
                    <label>Description</label>
                    <textarea type="text" rows="5" name="description" id="email" class="form-control @error ('description') is-invalid @enderror" > 
                        {{old('description', $lesson->description)}} </textarea>
 
                </div>
                
                <button type="submit" class="btn btn-outline-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection