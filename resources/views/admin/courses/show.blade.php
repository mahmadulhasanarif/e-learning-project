@extends('admin.layout.layout')

@section('content')

<div class="container">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Course Page</h1></div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="2">
                   
            <tr>
                <th>Course Title:</th>
                <td>{{$courses->title}}</td> 
            </tr>
            <tr>
                <th>Description:</th>
                <td>{{$courses->description}}</td>
            </tr>
        
            <tr>
                <th>User:</th>
                <td>{{$courses->user_id}}</td>
            </tr>
            <tr>
                <th>Category:</th>
                <td>{{$courses->category_id}}</td>
            </tr>
            
            <tr>
                <th>Photo:</th>
                <td><img src="{{$courses->photo}}" alt="" width="100px"></td>
            </tr>
        </table>
    </div>
</div>
</div>
@endsection