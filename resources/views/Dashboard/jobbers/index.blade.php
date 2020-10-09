@extends('Dashboard\Layout\sidebar')

@php 
    $route = 'jobbers';

@endphp 

@section('content')


<div class="card ">

    <div class="card-header ">
        <h4 class="card-title">jobbers</h4>
        <p class="card-category">Number Of jobbers {{$jobbers->total()}}</p>
    </div>

    <div class="card-body ">
      
      {{-- @if(auth()->user()->hasPermission('create_jobbers')) --}}

        <!-- Button trigger modal -->
        <a href="{{ route('jobbers.create') }}" class="btn btn-outline-warning">
         <i class="fa fa-user-plus"></i> Create Jobber
        </a>
      {{--    
       @else
        <!-- Button trigger modal -->
        <button class="btn btn-outline-primary" disabled>
         <i class="fa fa-plus"></i> Create User
        </button>
       @endif
      --}}
      
      @if($jobbers->count() > 0)
       <ul id="success" class="list-unstyled"></ul>
        <table class="table">
            <thead>
             <th>index</th>
             <th>Name</th>
             <th>Photo</th>
             <th>Age</th>
             <th>Email</th>
             <th>NationalID</th>
             <th>Address</th>
             <th>location</th>
             <th>Action</th>

            </thead>
            <tbody class="cont-data">
             @foreach ($jobbers as $index=>$jobber)
              <tr id="{{$jobber->id}}">
                <td>{{$index +1}}</td>

                <td>{{$jobber->name}}</td>
                <td><img src='{{asset($jobber->image_path)}}' class="photo-user"></td>
                <td>{{$jobber->age}}</td>
                
                <td>{{$jobber->email}}</td>
                <td>{{$jobber->nationalid}}</td>
                <td>{{$jobber->address}}</td>
                <td>{{$jobber->location}}</td>
                
                

                <td>
                  @if(auth()->user()->hasPermission('update-jobbers'))
                  <a class="btn btn-info" href="{{ route($route. '.edit', [$jobber->id]) }}">Edit <i class="fa fa-edit"></i>
                  </a>
                 @endif
                  @if(auth()->user()->hasPermission('read-jobbers'))
                
                  <a class="btn btn-success" href="{{ route($route. '.show', [$jobber->id]) }}"> <i class="fa fa-eye"></i>
                    Show </a>
                @endif
                @if(auth()->user()->hasPermission('delete-jobbers'))
                
                  <form action="{{ route($route. '.destroy', [$jobber->id]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}  
                    <button  type="submit"  class="btn btn-danger">
                      Delete <i class="fa fa-times"></i>
                    </button>
                </form>
                @endif
                 {{--     @if(auth()->user()->hasPermission('update_jobbers')) 
                
                 @else
                   <button class="btn btn-info" disabled>Edit <i class="fa fa-edit"></i>
                 @endif

                 @if(auth()->user()->hasPermission('delete_jobbers'))
                    
                 @else
                    <button class="btn btn-danger deleteUser" disabled>
                       Delete <i class="fa fa-times"></i>
                    </button>
                 @endif
                 
                 --}}  
                
                </td>

              </tr>
             @endforeach
            </tbody>
        </table>

            @else
             <h1><i class="fa fa-frown-o"></i> sorry, not_found_data</h1>
            @endif
    </div>

</div>



@endsection
