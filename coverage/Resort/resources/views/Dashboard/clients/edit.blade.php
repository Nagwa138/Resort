@extends('Dashboard\Layout\sidebar')

@php 
    $route = 'clients';

@endphp 

@section('content')


<div class="card ">


<form action="{{ route($route. '.update', ['id' => $client->id]) }}" method="POST" >
  {{ csrf_field() }}
  {{ method_field("POST") }}
  

    <div class="form-group row">
     <div class="col-sm-6 mb-3 mb-sm-0">

        <input type="text" class="form-control" name="name" value="{{ $client->name }}"  placeholder="Name">

     </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-6">
    
        <input type="email" class="form-control " name="email" value="{{ $client->email }}" placeholder="Email Address"
        email>
      </div>
      
      <div class="col-sm-6 ">
       <input type="password" class="form-control " name="password" placeholder="Password">

        @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror

      </div>  

    </div>


    <div class="form-group row">
      <div class="col-md-8">
        
        <input type="text" class="form-control " value="{{ $client->job }}" name="job" 
               placeholder="Job">
 
         @error('job')
          <span class="invalid-feedback" role="alert">
           <strong>{{ $message }}</strong>
          </span>
         @enderror
      
      </div>
    </div>  
    
    <div class="form-group row">
     <div class="col-md-4">
       
       <input type="number" class="form-control " value="{{ $client->age }}" name="age" 
              min="16" mix="65" placeholder="Age">

        @error('age')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
         </span>
        @enderror
     
     </div>
     
     <div class=" col-md-4">
        <input type="text"  class="form-control " name="address" value="{{ $client->address }}">
        
     </div>

    
    </div>
   
     
    
     
      
    <button type="submit" class="btn btn-primary update " >update changes</button>
     
</form>

</div>
@endsection