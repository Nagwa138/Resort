@extends('Dashboard\Layout\sidebar')

@php 
    $route = 'jobbers';

@endphp 

@section('content')


<div class="card ">


<form action="{{ route($route. '.update', ['id' => $jobber->id]) }}" method="POST"  enctype="multipart/form-data">
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

       <img class="photo-camera" src="{{ asset($jobber->image_path)}}">
     </div>

     <div class="col-sm-6">
      <img src="{{asset('images/defualt.jpg')}}" class="image-preview" height="80px" width="80px">
     </div>

    </div>

    <div class="form-group row">
     <div class="col-sm-6 mb-3 mb-sm-0">

        <input type="text" class="form-control" name="name" value="{{ $jobber->name }}"  placeholder="Name">

     </div>
    </div>

    <div class="form-group">
     <input type="email" class="form-control " name="email" value="{{ $jobber->email }}" placeholder="Email Address"
     email>

    </div>

    <div class="form-group row">
     <div class="col-sm-6 mb-3 mb-sm-0">
      <input type="password" class="form-control " name="password" placeholder="Password">

      @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror


    </div>

    <div class="form-group row">
     <div class="col-md-5">
       
       <input type="number" class="form-control " value="{{ $jobber->age }}" name="age" 
              min="20" mix="65" placeholder="Age">

        @error('age')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
         </span>
        @enderror
     
     </div>
     
     <div class=" col-md-6">
     
      <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="address">

      @error('address')
        <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
       </span>
      @enderror
     </div>

    </div>
    
    <div class="form-group row">
     <div class="col-md-12">
     
      <input type="number"  class="form-control" value="{{ $jobber->nationalid }}" name="nationalid" 
        min ="14"  placeholder="nationalid" length= "14">

      @error('nationalid')
       <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
       </span>
      @enderror
    
     </div>
    </div>
    
     
    <div class="form-group row">
     <div class="col-md-8">
     
       <select  class="form-control " name="address">
       @foreach($locations as $loca)
        <option value="{{ $loca }}" {{$jobber->address == $loca  ? 'selected' : '' }}>{{ $loca}}</option>
       @endforeach 
       </select>

     
      </div>
     </div>
     
    
        <button type="submit" class="btn btn-primary" >Save changes</button>
    
</form>

</div>
@endsection