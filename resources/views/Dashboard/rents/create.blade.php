@extends('Dashboard\Layout\sidebar')

@php 
    $route = 'rents';

@endphp 

@section('content')


<div class="card ">

 <form action="{{ route($route.'.store')}}" method="post" enctype="multipart/form-data">
   {{ csrf_field() }}
  {{ method_field("POST") }}



  <div class="form-group row">
   <div class="col-sm-6 mb-3 mb-sm-0">
   
    <input  type="hidden" name="post_id" class="form-control"  value="{{ $post->id }}" >
    <input  type="hidden" name="jobber" class="form-control "  value="{{ $post->jobber->name }}" >
    <input  type="hidden" name="client_id" class="form-control " > {{-- value="{{  Auth::guard('clients')->user()->name }}" >--}} 
    
   </div>
  </div>


    
    <div class="form-group row">
     <div class="col-sm-6 mb-3 mb-sm-0">
      <select  class="form-control members @error('members') is-invalid @enderror" name="location">
      
      <option>Chosse your locations</option>
      @foreach($locations as $loc)
       <option value="{{ $loc }}">{{ $loc }}</option>
      @endforeach
        @error('members')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
         </span>
        @enderror
     </select>
     </div>
    </div>

     <div class="form-group row">
      <div class="col-sm-6 mb-3 mb-sm-0">
       <input  type="date" name="start_at" class="form-control start_at @error('start_at') is-invalid @enderror"  value="{{ old('start_at') }}" >
       
       @error('start_at')
        <span class="invalid-feedback" role="alert">
           <strong>{{ $message }}</strong>
        </span>
       @enderror
      </div>
     </div>
     
     <div class="form-group row">
      <div class="col-sm-6 mb-3 mb-sm-0">
         <input  type="date" name="end_at" class="form-control end_at @error('end_at') is-invalid @enderror"  value="{{ old('end_at') }}" >
         
         @error('end_at')
         <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
         </span>
         @enderror
      </div>
     </div>
      
      <button type="submit" class="btn btn-primary" >Save changes</button>
 </form>

</div>
@endsection