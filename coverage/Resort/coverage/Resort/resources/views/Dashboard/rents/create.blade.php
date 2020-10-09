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
      <input type="number" class="form-control members @error('members') is-invalid @enderror" name="members" value="{{ old('members') }}"  placeholder="Members Count ...">
      
      @error('members')
       <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
       </span>
      @enderror
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
    <input type="hidden" name="client_id" value="{{$client_id}}">
    <input type="hidden" name="jobber_id" value="{{$jobber_id}}">
    <input type="hidden" name="post_id" value="{{$post_id}}">
   <button type="submit" class="btn btn-primary" >Save changes</button>
</form>

</div>
@endsection