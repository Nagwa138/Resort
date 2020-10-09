@extends('Dashboard\Layout\sidebar')

@php 
    $route = 'locations';

@endphp 

@section('content')


<div class="card ">


<form action="{{ route($route. '.store') }}" method="POST">
  {{ csrf_field() }}
  {{ method_field("POST") }}
  
    

    <div class="form-group row">
     <div class="col-md-5">
       
       <input type="number" class="form-control @error('family') is-invalid @enderror" name="family" 
              min="1" length="6" placeholder="Family">

        @error('family')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
         </span>
        @enderror
     
     </div>
     

    </div>
     
     <div class="form-group row">
      <div class="col-md-8">
     
       <input  class="form-control @error('location') is-invalid @enderror" name="location" placeholder="Location">

       @error('location')
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