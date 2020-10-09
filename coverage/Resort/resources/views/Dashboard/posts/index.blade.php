@extends('Dashboard\Layout\sidebar')

@php 
    $route = 'posts';

@endphp 

@section('content')


<div class="card ">

    <div class="card-header ">
        <h4 class="card-title"><i class="fa fa-table"></i> Table Of Post</h4>
        <p class="card-category">Number Of Posts {{$posts->total()}}</p>
    </div>

    <div class="card-body ">
      
      {{-- @if(auth()->user()->hasPermission('create_posts')) --}}

        <!-- Button trigger modal -->
        <a href="{{ route($route.'.create') }}" class="btn btn-outline-warning">
         <i class="fa fa-plus"></i> Create Post
        </a>
      {{--    
       @else
        <!-- Button trigger modal -->
        <button class="btn btn-outline-primary" disabled>
         <i class="fa fa-plus"></i> Create User
        </button>
       @endif
      --}}
      
      @if($posts->count() > 0)
       <ul id="success" class="list-unstyled"></ul>
        <table class="table">
            <thead>
             <th>index</th>
             <th>Name</th>
             <th>Title</th>
             <th>Photo</th>
             <th>Content</th>
             <th>location</th>
             <th>Action</th>

            </thead>
            <tbody class="cont-data">
             @foreach ($posts as $index=>$post)
              
                <td>{{$index +1}}</td>
                <td>{{$post->jobber->name}}</td>
                <td>{{$post->title}}</td>
                <td><img src='{{asset($post->image_path)}}' class="photo-user"></td>
                <td>{{$post->content}}</td>
                
                <td>{{$post->address}}</td>
                
                

                <td>
                
                  <a class="btn btn-info" href="{{ route($route. '.edit', [$post->id]) }}">Edit <i class="fa fa-edit"></i>
                  </a>
                    
                
                  <form action="{{ route($route. '.destroy', [$post->id]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}  
                    <button  type="submit"  class="btn btn-danger delete">
                      Delete <i class="fa fa-times"></i>
                    </button>
                </form>
                
                 {{--     @if(auth()->user()->hasPermission('update_posts')) 
                
                 @else
                   <button class="btn btn-info" disabled>Edit <i class="fa fa-edit"></i>
                 @endif

                 @if(auth()->user()->hasPermission('delete_posts'))
                    
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
