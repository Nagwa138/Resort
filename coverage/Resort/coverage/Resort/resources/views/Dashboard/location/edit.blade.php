@extends('Dashboard\Layout\sidebar')

@php 
    $route = 'locations';

@endphp 

@section('content')


<div class="card ">


<form action="{{ route($route. '.update', [$location->id]) }}" method="POST">
  {{ csrf_field() }}
  {{ method_field("POST") }}
  
    

    <div class="form-group row">
     <div class="col-md-5">
       
       <input type="number" class="form-control" value="{{ $location->family }}" name="family" 
              min="1" length="6" placeholder="Family">
     
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
      <div class="col-md-8">
     
       <input  class="form-control " name="location" value="{{ $location->location }}" placeholder="Location">

      </div>
     </div>
     
    
        <button type="submit" class="btn btn-primary" >Update changes</button>
    
</form>

</div>
@endsection