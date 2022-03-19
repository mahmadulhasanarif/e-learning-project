@extends('admin.layout.layout')

@section('content')
<div style="border: 2px solid rgb(7, 238, 38)" class="container ">
    <div class="row clearfix">
        <div class="col-md-3">
            <h2><strong>Category Page</strong></h2>
        </div>
        <div class="col-md-7">
            <form action="{{url('admin/category')}}" method="POST">
                @csrf
                <div style="float: right">
                    @error('name')
                    <small style="color: red">{{ $message }}</small>
                    @enderror
                   </div>
                <div class="mb">
                  <label>Category Add</label>
                  <input type="text" id="name" class="form-control @error ('name') is-invalid @enderror" value="{{old('name')}}" name="name" aria-describedby="Name">
                </div>
                
                <button type="submit" class="btn btn-outline-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection