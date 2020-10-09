@extends('Dashboard\Layout\sidebar')

@php 
  
  $route = 'users'

@endphp  



@section('content')


<div class="card ">


  <form action="{{ route($route.'.store') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field("POST") }}

    <div class="form-group row">
      <div class="col-sm-6 mb-3 mb-sm-0">
        <i class="fa fa-camera photo-camera"></i>
        <input type="file" class="form-control image @error('image') is-invalid @enderror" name="image" value="{{ $user->image}}" placeholder="First Name">

        @error('image')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror

      </div>

      <div class="col-sm-6">
        <img src="{{$user->image}}" class="image-preview" height="80px" width="80px">
      </div>

    </div>

    <div class="form-group row">
      <div class="col-sm-6 mb-3 mb-sm-0">

        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" placeholder="Name">

        @error('name')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror

      </div>
    </div>

    <div class="form-group">
      <input type="email" class="form-control @error('email') is-invalid @enderror " name="email" value="{{$user->email }}" placeholder="Email Address">

      @error('email')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror


    </div>

    
    <div class="form-group">
      <input type="text" class="form-control @error('position') is-invalid @enderror " name="position" value="{{ $user->position }}" placeholder="Position">

      @error('position')
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
        <input id="password-confirm" type="password" class="form-control @error('password-confirm') is-invalid @enderror" name="password_confirmation" placeholder="Repeat Password">

        @error('password-confirm')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>

    </div>

    <div class="form-group row">
      <div class="nav-tabs-custom">
       @php
         $moduls = ['users', 'clients', 'jobbers','posts','reviews', 'locatoins'];
         $maps   = ['create', 'read', 'update', 'delete'];

       @endphp

        <ul class="nav nav-tabs">

         @foreach($moduls as $index=>$modul)
          <li class="nav-item {{$index == '0' ? 'active' : '' }}">
           <a  href="#{{$modul}}" class="nav-link" data-toggle="tab">{{$modul}}</a>
          </li>
         @endforeach

        </ul>

        <div class="tab-content">
         @foreach ($moduls as $index=>$modul)

          <div class="tab-pane fade show  {{$index == '0' ? 'active' : '' }}" id="{{$modul}}">

           @foreach($maps as $map)
           <input type="checkbox" name="permissions[]" value="{{$map . '_' . $modul}}">

                   {{$map}}

           {{$user->hasPermission($map ."_" . $modul) ? 'checked' : ''}}>

           @endforeach

           </div>

          @endforeach

        </div>
         <!-- /.tab-content -->



      </div>

     </div>
    <button type="submit" class="btn btn-primary">Save changes</button>

  </form>

</div>
@endsection