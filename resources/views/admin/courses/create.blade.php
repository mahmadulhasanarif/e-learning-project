@extends('admin.layout.layout')

@section('content')
<div style="border: 2px solid rgb(7, 238, 38)" class="container ">
    <div class="row clearfix">
        <div class="col-md-3">
            <h2><strong>Course Page</strong></h2>
        </div>
        <div class="col-md-7">
            <form action="/course" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="float: right">
                    @error('name')
                    <small style="color: red">{{ $message }}</small>
                    @enderror
                   </div>
                <div class="mb">
                  <label>Course Title</label>
                  <input type="text" id="title" class="form-control @error ('title') is-invalid @enderror" value="{{old('title')}}" name="title" aria-describedby="Name">
                </div>
                
                <div class="mb">
                    <label>Category Name</label>
                        <select name="category_id" class="form-control @error ('category_id') is-invalid @enderror" >
                            <option value="selected disable">select category</option>
                            
                            @foreach ($categories as $Category)
                                <option value=" {{$Category->id}} ">{{$Category->name}}</option>
                            @endforeach
                            
                        </select>
                </div>
                
                
                
                <div class="mb">
                    <label>Description</label>
                    <textarea type="text" name="description" id="email" class="form-control @error ('description') is-invalid @enderror" > </textarea>
 
                    </div>
                  
                  <div class="mb">
                    <label>Photo</label>
                    <input type="file" id="photo" class="form-control @error ('photo') is-invalid @enderror" value="{{old('photo')}}" name="photo" aria-describedby="image">
                  
                <button type="submit" class="btn btn-outline-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection