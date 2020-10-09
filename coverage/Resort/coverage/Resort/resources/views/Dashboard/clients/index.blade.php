@extends('Dashboard\Layout\sidebar')

@php 
    $route = 'clients';

@endphp 

@section('content')


<div class="card ">

    <div class="card-header ">
        <h4 class="card-title">Table Of Clients</h4>
        <p class="card-category">Number Of Clients {{$clients->total()}}</p>
    </div>

    <div class="card-body ">
    
      
      @if($clients->count() > 0)
       <ul id="success" class="list-unstyled"></ul>
        <table class="table">
            <thead>
             <th>index</th>
             <th>Email</th>
             <th>Name</th>
             <th>Age</th>
             <th>Job</th>
             <th>Address</th>
             <th>Family</th>
             <th>Action</th>

            </thead>
            <tbody class="cont-data">
             @foreach ($clients as $index=>$client)
              <tr id="{{$client->id}}">
                <td>{{$index +1}}</td>

                <td>{{$client->email}}</td>

                <td>{{$client->name}}</td>
          
                <td>{{$client->age}}</td>
                
                <td>{{$client->job}}</td>
                <td>{{$client->address}}</td>
                
                <td>{{$client->family}}</td>
                
                
                

                <td>
                
                  <a class="btn btn-info " href="{{ route($route. '.edit', [$client->id]) }}">Edit <i class="fa fa-edit"></i>
                  </a>
                    

                  <form action="{{ route($route. '.destroy', [$client->id]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}  
                    <button  type="submit"  class="btn btn-danger">
                      Delete <i class="fa fa-times"></i>
                    </button>
                </form>
                
                 {{--     @if(auth()->client()->hasPermission('update_clients')) 
                
                 @else
                   <button class="btn btn-info" disabled>Edit <i class="fa fa-edit"></i>
                 @endif

                 @if(auth()->client()->hasPermission('delete_clients'))
                    
                 @else
                    <button class="btn btn-danger " disabled>
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
