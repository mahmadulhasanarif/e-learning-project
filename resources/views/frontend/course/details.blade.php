@extends('frontend.layout.layout')

@section('content')
    <div class="page-header">
        <div class="container">
            <h1 style="color: aqua">{{ $course->title }}</h1>
        </div>
    </div>

    <div class="course-description">
        <div class="container">
            <div class="row clearfix">
                <div style="padding:40px 0px" class="col-md-4">
                    <img class="img-fluid" src="{{ Storage::url($course->photo) }}" width="400px"
                        alt="{{ $course->title }}">
                </div>

                <div class="col-md-8">
                    <div style="padding: 20px">
                        <h2>{{ $course->title }}</h2>
                    <p>{{ $course->description }}</p>
                    <div class="course-lesson mt-5">
                        <h2><b>Lessons</b></h2>
                        <ol>
                            @foreach ($course->lessons as $lesson)
                                <li>
                                    <a class="nav-link" href="{{ Route('lesson.details', ['lesson'=> $lesson->id]) }}">{{ $lesson->title }}</a>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
