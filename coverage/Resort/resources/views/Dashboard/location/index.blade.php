@extends('Dashboard\Layout\sidebar')

@php 
    $route = 'locations';

@endphp 

@section('content')


<div class="card ">

    <div class="card-header ">
        <h4 class="card-title">locations</h4>
        <p class="card-category">Number Of locations {{$locations->total()}}</p>
    </div>

    <div class="card-body ">
      
      {{-- @if(auth()->user()->hasPermission('create_locations')) --}}

        <!-- Button trigger modal -->
        <a href="{{ route($route.'.create') }}" class="btn btn-outline-warning">
         <i class="fa fa-map"></i> Create Location
        </a>
      {{--    
       @else
        <!-- Button trigger modal -->
        <button class="btn btn-outline-primary" disabled>
         <i class="fa fa-plus"></i> Create User
        </button>
       @endif
      --}}
      
      @if($locations->count() > 0)
       <ul id="success" class="list-unstyled"></ul>
        <table class="table">
            <thead>
             <th>index</th>
             <th>Family</th>
             <th>location</th>
             <th>Action</th>

            </thead>
            <tbody class="cont-data">
             @foreach ($locations as $index=>$location)
              
                <td>{{$index +1}}</td>

                <td>{{$location->family}}</td>
                <td>{{$location->location}}</td>
                
                

                <td>
                
                  <a class="btn btn-info editUser" href="{{ route($route. '.edit', [$location->id]) }}">Edit <i class="fa fa-edit"></i>
                  </a>
                    
                    <form action="{{ route($route. '.destroy', ['id' => $location->id]) }}" method="post">
                     {{ csrf_field() }}
                     {{ method_field("delete") }}
                      <button type="submit"  class="btn btn-danger delete">
                        Delete <i class="fa fa-times"></i>
                      </button>
                    </form>
                 {{--     @if(auth()->user()->hasPermission('update_locations')) 
                
                 @else
                   <button class="btn btn-info" disabled>Edit <i class="fa fa-edit"></i>
                 @endif

                 @if(auth()->user()->hasPermission('delete_locations'))
                    
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
