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
     <input type="text"   name="jobber_id" value="{{ $post->jobber_id }}" class="form-control" hidden>
     <input type="text"   name="post_id" value="{{ $post->id }}" class="form-control" hidden>
     <input type="text"   name="client_id" value="{{ Auth::guard('clients')->user()->id }}" class="form-control" hidden>
    </div>
  
    <div class="form-group row">
     <div class="col-sm-6 mb-3 mb-sm-0">
      <select  class="form-control members @error('members') is-invalid @enderror" name="members">
      
      <option>Chosse your Members</option>
      @foreach($locations as $loc)
       <option value="{{ $loc->family }}">{{ $loc->family }}</option>
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
        <button type="submit" class="btn btn-primary create" >Save changes</button>
</form>

</div>
@endsection