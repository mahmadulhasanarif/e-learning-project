@extends('admin.layout.layout')

@section('content')

<div class="container">

     @if ($message)
         <div class="alert alert-success">
             {{$message}}
         </div>
     @endif
    
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Course Page</h1>
    <a href="{{url('course/create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i> Add Course</a>
</div>



<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Course Table</h6>
            
            
            <form style="float: right"
                class="d-none d-sm-inline-block form-inline mr-auto ml-md my my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-1 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Course Title</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Course Title</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        {{-- {{$i=1}} --}}
                        @foreach ($courses as $course)
                        
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$course->title}}</td>
                            <td>{{$course->created_at}}</td>
                            <td>
                                <form action="{{url('/course/'.$course->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger">Delete</button>
                                    <a class="btn btn-outline-success" href="{{url('/course/'.$course->id .'/edit')}}">Edit</a>
                                    <a class="btn btn-outline-info" href="{{url('/course/'.$course->id)}}">View</a>
                                </form>
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


</div>
@endsection