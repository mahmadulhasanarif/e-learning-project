@extends('admin.layout.layout')

@section('content')

<div class="container">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">lesson Page</h1>
    <a href="{{url('admin/lesson/create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i> Add Lesson</a>
</div>



<div class="container">
    
    @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{session('message')}}
            </div>
        @endif
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lesson Table</h6>
            
            
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
                            <th>Category</th>
                            <th>Video URL</th>
                            <th> Created Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Video URL</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        {{$i=1}}
                        @foreach ($lessons as $lesson)
                        
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$lesson ->title}}</td>
                            <td>{{$lesson ->video_url}}</td>
                            <td>{{$lesson->created_at}}</td>
                            <td>
                                
                                    <a class="btn btn-primary" href="{{url('admin/lesson/'. $lesson->id)}}">show</a>
                                
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