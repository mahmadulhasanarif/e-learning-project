@extends('admin.layout.layout')

@section('content')
<div class="container">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Course Page</h1></div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="2">
                   
            <tr>
                <th>Lesson Title:</th>
                <td>{{$lessons->title}}</td> 
            </tr>
            
            <tr>
                <th>Video URL:</th>
                <td>{{$lessons->video_url}}</td> 
            </tr>
            
            <tr>
                <th>Course:</th>
                <td>{{$lessons->title}}</td>
            </tr>
            
            <tr>
                <th>Description:</th>
                <td>{{$lessons->description}}</td>
            </tr>
            
            
           

        </table>

        <form action="{{url('/lesson/'.$lessons->id)}}" method="POST">
            @csrf
            @method('delete')
            <button class="btn btn-outline-danger">Delete</button>
            <a class="btn btn-warning" href="{{url('lesson/'.$lessons->id.'/edit')}}">Edit</a>
        </form>
    </div>
</div>
</div>
@endsection