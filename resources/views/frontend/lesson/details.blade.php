@extends('frontend.layout.layout')

@section('content')
    <div class="page-header">
        <div class="container">
            <h1 style="color: aqua">{{ $course->title }}</h1>
        </div>
    </div>

    <div class="lesson-details">
        <div class="">
            <div class="row clearfix">

                <div class="col-md-3">
                    <div class="course-left">
                        <h3><b>{{ $course->title }}</b></h3>
                        <div>
                            <ol>
                                @foreach ($course->lessons as $lesson)
                                    <li>
                                        <a class="nav-link"
                                            href="{{ Route('lesson.details', ['lesson' => $lesson->id]) }}"
                                            >{{ $lesson->title }}</a>
                                    </li>
                                @endforeach
                                </ol>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    
                    <div class="embed-responsive embed-responsive-21by9">
                        @if ($lesson->video_url)
                        <iframe class="embed-responsive-item" src="{{$lesson->video_url}}"></iframe>
                        @endif

                      </div>
                    <h1><strong class="mt-3">{{ $lesson->title }}</strong></h1>
                    <small><b>Publish:</b> {{$lesson->created_at}}</small>
                    <p class="mt-3">{{ $lesson->description }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
