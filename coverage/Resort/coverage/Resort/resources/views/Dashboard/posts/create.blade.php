@extends('Dashboard\Layout\sidebar')

@php 
    $route = 'posts';

@endphp 

@section('content')


<div class="card ">


<form action="{{ route($route. '.store') }}" method="POST"  enctype="multipart/form-data">
  {{ csrf_field() }}
  {{ method_field("POST") }}
  
<input type="hidden" name="jobber_id" value="1">
    <div class="form-group row">
     <div class="col-sm-6 mb-3 mb-sm-0">
        <i class="fa fa-camera photo-camera"></i>
      <input type="file" class="form-control image @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}"  placeholder="First Name">
      
      @error('image')
       <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
       </span>
      @enderror

     </div>

     <div class="col-sm-6">
      <img src="{{asset('uploads/users_images/defualt.png')}}" class="image-preview" height="80px" width="80px">
     </div>

    </div>

    <div class="form-group row">
     <div class="col-sm-6 mb-3 mb-sm-0">

        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}"  placeholder="title">

        @error('title')
         <span class="invalid-feedback" role="alert">
           <strong>{{ $message }}</strong>
         </span>
        @enderror

     </div>
    </div>

    <div class="form-group">
     <input type="text" class="form-control @error('content') is-invalid @enderror " name="content" placeholder="content">

       @error('content')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
       @enderror


    </div>


     
     <div class="form-group row">
      <div class="col-md-8">
     
       <select  class="form-control @error('address') is-invalid @enderror" name="address">
        <option value="">Choose Your Location....</option>
       
       @foreach($locations as $loca)
        <option value="{{ $loca->location }}">{{ $loca->location }}</option>
       @endforeach 
      
       </select>

      </div>
     </div>
     
    
        <button type="submit" class="btn btn-primary" >Save changes</button>
    
</form>

</div>
@endsection