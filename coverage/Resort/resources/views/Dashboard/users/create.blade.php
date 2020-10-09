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
        <input type="file" class="form-control image @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" placeholder="First Name">

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

        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name">

        @error('name')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror

      </div>
    </div>

    <div class="form-group">
      <input type="email" class="form-control @error('email') is-invalid @enderror " name="email" value="{{ old('email') }}" placeholder="Email Address">

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
        <input id="password-confirm" type="password" class="form-control @error('password-confirm') is-invalid @enderror" name="password_confirmation" placeholder="Repeat Password">

        @error('password-confirm')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>

    </div>

     
     <div class="form-group row">
      
       <div class="col-md-8">
        <select class="form-control" name="role">
          <option>Chosse Role For User!!</option>
          
          @foreach($roles as $role)
            <option>{{ $role->name }}</option>
          @endforeach
        </select>
       </div>
      
     </div>
     
      {{-- 
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

                @endforeach

                </div>

                @endforeach

              </div>
              <!-- /.tab-content -->



             </div>

           </div> 
     
      --}}

    <button type="submit" class="btn btn-primary create">Save changes</button>

  </form>

</div>
@endsection