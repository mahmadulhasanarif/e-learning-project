@extends('frontend.layout.layout')



@section('content')

<div class="page-header">
    <div class="container">
        <h1 style="color: aqua">Course List</h1>
    </div>
</div>

    <div class="course">
        <div class="container">
            <div class="row">
                @foreach ($courses as $course)
                <div class="col-md-4">
                    <div class="card" style="width: 24rem;">
                        <img src="{{Storage::url($course->photo)}}" height="200px" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">{{$course->title}}</h5>
                          <p class="card-text"><span class="badge bg-success">{{$course->category->name}}</span></p>
                          <a href="#" class="btn btn-primary">Course Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
