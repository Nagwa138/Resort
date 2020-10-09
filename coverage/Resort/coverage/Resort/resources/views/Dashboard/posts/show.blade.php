@extends('Dashboard\Layout\sidebar')

@php 
    $route = 'posts';

@endphp 

@section('content')


<div class="card ">

    <div class="card-header ">
        <h4 class="card-title"><i class="fa fa-table"></i>Post</h4>
        
    </div>

    <div class="card-body ">
      <ul class="unlisted-style">
        <li>
          <div class="pull-left">
            <h3> Image :  </h3>
            <img src="{{ $post->image_path }}" class="image-circle">
            
          </div>
        
        </li>
        
        <li>
         <h3>Title : </h3>
         <p>{{ $post->title }}</p>
        </li>
        
        
        <li>
          <h3>Content : </h3>
          <p>{{ $post->content }}</p>
        </li>
        
        <li>
          <h3>Location : </h3>
          <p>{{ $post->address }}</p>
        </li>
          
        <li>
          <h3>Status : </h3>
          <p>{{ $post->status }}</p>
         </li>
         
      </ul>
    </div>
</div>



@endsection
