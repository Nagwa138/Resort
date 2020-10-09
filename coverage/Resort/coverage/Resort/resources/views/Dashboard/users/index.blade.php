@extends('Dashboard\Layout\sidebar')


@php 
  
  $route = 'users'

@endphp  


@section('content')


<div class="card ">

    <div class="card-header ">
        <h4 class="card-title">Table Of Admin</h4>
        <p class="card-category">Number Of Admin {{$users->total()}}</p>
    </div>

    <div class="card-body ">
      
      {{-- @if(auth()->user()->hasPermission('')) --}}

        <!-- Button trigger modal -->
        <a href="{{ route($route.'.create') }}" class="btn btn-outline-warning">
         <i class="fa fa-user"></i> Create Admin
        </a>
      {{--    
       @else
        <!-- Button trigger modal -->
        <button class="btn btn-outline-primary" disabled>
         <i class="fa fa-plus"></i> Create User
        </button>
       @endif
      --}}
      
      @if($users->count() > 0)
       <ul id="success" class="list-unstyled"></ul>
        <table class="table">
            <thead>
             <th>index</th>
             <th>Name</th>
             <th>Email</th>
             <th>Position</th>
             <th>Image</th>
             

            </thead>
            <tbody class="cont-data">
             @foreach ($users as $index=>$user)
              <tr id="{{$user->id}}">
                <td>{{$index +1}}</td>

                <td>{{$user->name}}</td>
                
                <td>{{$user->email}}</td>
                
                <td>{{$user->position}}</td>
                
                <td><img src='{{asset($user->image_path)}}' class="photo-user"></td>
                

                
                <td>
                
                  {{-- <a class="btn btn-info" href="{{ route($route. '.edit', [$user->id]) }}">Edit <i class="fa fa-edit"></i>
                  </a> --}}
                  
                  <form action="{{ route($route. '.destroy', [$user->id]) }}" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('delete') }}  
                      <button  type="submit"  class="btn btn-danger">
                        Delete <i class="fa fa-times"></i>
                      </button>
                  </form> 
                  
                     
                 {{--     @if(auth()->user()->hasPermission('update_users')) 
                
                 @else
                   <button class="btn btn-info" disabled>Edit <i class="fa fa-edit"></i>
                 @endif

                 @if(auth()->user()->hasPermission('delete_users'))
                    
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
