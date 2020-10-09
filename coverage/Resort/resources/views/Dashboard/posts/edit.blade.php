@extends('Dashboard\Layout\sidebar')

@php 
    $route = 'posts';

@endphp 

@section('content')


<div class="card ">


<form action="{{ route($route. '.update', ['id' => $post->id]) }}" method="POST"  enctype="multipart/form-data">
  {{ csrf_field() }}
  {{ method_field("POST") }}
  
    <div class="form-group row">
     <div class="col-sm-6 mb-3 mb-sm-0">
        <i class="fa fa-camera photo-camera"></i>
      <input type="file" class="form-control image @error('image') is-invalid @enderror" name="image">
      
      @error('image')
       <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
       </span>
      @enderror

       <img class="photo-camera" src="{{ asset($post->image_path)}}">
     </div>

     <div class="col-sm-6">
      <img src="{{asset('images/defualt.jpg')}}" class="image-preview" height="80px" width="80px">
     </div>

    </div>

    <div class="form-group row">
     <div class="col-sm-6 mb-3 mb-sm-0">

        <input type="text" class="form-control" name="title" value="{{ $post->title }}"  placeholder="title">

     </div>
    </div>

    <div class="form-group">
     <input type="text" class="form-control " name="content" value="{{ $post->content }}" placeholder="content Address">

    </div>


    <div class="form-group row">
 
     
     <div class=" col-md-6">
     
      <input type="text" class="form-control" name="address" placeholder="address">

    
     </div>

    </div>
    
    
     
    
        <button type="submit" class="btn btn-primary update" >Save changes</button>
    
</form>

</div>
@endsection