@extends('Dashboard\Layout\sidebar')

@php 
    $route = 'rents';
      
@endphp 
@section('content')
<div class="card ">
    <div class="card-header ">
        <h4 class="card-title"><i class="fa fa-table"></i> Review your Rents</h4>
        <p class="card-category">Number Of Rents </p>
    </div>
    <div class="card-body ">
      
      {{-- @if(auth()->user()->hasPermission('create_posts')) --}}

        <!-- Button trigger modal 
        <a href="{{-- route($route.'.create') --}}" class="btn btn-outline-warning">
         <i class="fa fa-plus"></i> Create Post
        </a>
        -->
      {{--    
       @else
        <!-- Button trigger modal -->
        <button class="btn btn-outline-primary" disabled>
         <i class="fa fa-plus"></i> Create User
        </button>
       @endif
      --}}
      
      @if($posts->count() > 0)
        <div class="container">
          <div class="row">
          @foreach($posts as $post)
            <div class="col-md-6">
              <div class="post">
                            
                <p>
                  <img src='{{asset($post->jobber->image_path) }}' class="image-user">
                  {{ $post->jobber->name }}
                 </p>
                
                <div class="title">
                
                  <h2> {{ $post->title }}</h2>
                  <h4>  <i class="fa fa-clock-o"></i> {{ $post->created_at->diffForHumans() }} </h4>
                </div>
                
                <div class="image-thumnail">
                  <img src={{asset($post->image_path)}} class="image-thumnail">
                </div>
                
                <div class="content">
                  <p>{{ $post->content }}</p>
                </div>
             
             <a href="{{ route($route.'.create', $post->id) }}" class="btn btn-success">Rent Now</a>
              </div>
              
            </div>  
            
          @endforeach
            
          </div>
        </div>
    @else
        <h1><i class="fa fa-frown-o"></i> sorry, not_found_data</h1>
      @endif
    </div>
</div>
@endsection
