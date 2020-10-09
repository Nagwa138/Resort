@extends('Dashboard\Layout\sidebar')

@php 
    $route = 'jobbers';

@endphp 

@section('content')


<div class="card ">


<form action="{{ route($route. '.store') }}" method="POST"  enctype="multipart/form-data">
  {{ csrf_field() }}
  {{ method_field("POST") }}
  
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
      <img src="{{asset('images/defualt.jpg')}}" class="image-preview" height="80px" width="80px">
     </div>

    </div>

    <div class="form-group row">
     <div class="col-sm-6 mb-3 mb-sm-0">

        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  placeholder="Name">

        @error('name')
         <span class="invalid-feedback" role="alert">
           <strong>{{ $message }}</strong>
         </span>
        @enderror

     </div>
    </div>

    <div class="form-group">
     <input type="email" class="form-control @error('email') is-invalid @enderror " name="email" placeholder="Email Address"
     email>

       @error('email')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
       @enderror


    </div>

    <div class="form-group row">
     <div class="col-sm-6 mb-3 mb-sm-0">
      <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">

      @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror


    </div>

     <div class="col-md-6">
      <input id="password-confirm" type="password" class="form-control @error('password-confirm') is-invalid @enderror" name="password_confirmation"  placeholder="Repeat Password">

       @error('password-confirm')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
       @enderror
     </div>

    </div>

    <div class="form-group row">
     <div class="col-md-5">
       
       <input type="number" class="form-control @error('age') is-invalid @enderror" name="age" 
              min="20" max="65" placeholder="Age">

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
     
      <input type="number"  class="form-control @error('nationalid') is-invalid @enderror" name="nationalid" 
        placeholder="nationalid">

      @error('nationalid')
       <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
       </span>
      @enderror
    
     </div>
    </div>
    
     <div class="form-group row">
      <div class="col-md-8">
     
       <select  class="form-control @error('address') is-invalid @enderror" name="address">
        <option value="">Choose Your Location....</option>
       
       @foreach($locations as $loca)
        <option value="{{ $loca->location }}">{{ $loca->location }}</option>
       @endforeach 
       </select>

       @error('address')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
       @enderror
      </div>
     </div>
     
    
    <button type="submit" class="btn btn-primary create" >Save changes</button>
    
</form>

</div>
@endsection