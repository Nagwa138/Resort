@extends('Dashboard\Layout\sidebar')

@php 
    $route = 'posts';
      
    $like_count = 0;
    $dislike_count = 0;
         
         

@endphp 

@section('content')


<div class="card ">

    <div class="card-header ">
        <h4 class="card-title"><i class="fa fa-table"></i> Table Of Post</h4>
        <p class="card-category">Number Of Posts </p>
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
        
        <div class="container">
          <div class="row">
          
          @foreach($posts as $post)
          <div class="col-md-6">
            <div class="post">
              
              <div class="title">
                 <h2> {{ $post->title }}</h2>
                 <h4>  <i class="fa fa-clock-o"></i> {{  $post->created_at->diffForHumans() }}</h4>
              </div>
              
              
              <div class="image-thumnail">
                <img src="{{ $post->image_path }}" class="image-thumnail">
              </div>
              
              <div class="content">
                <p>{{ $post->content }}</p>
              </div>
              
            </div>
          </div>  
          <div class="col-md-6">
            <table class="table">
              @foreach ($rents as $rent)
                @if ($post->id == $rent->post_id)
                    
              <tr>
                <th>
                  Jobber Name
                </th>
                <td>
                  @foreach ($jobbers as $jobber)
                      @if ($jobber->id == $rent->jobber_id)
                          {{$jobber->name}}
                      @endif
                  @endforeach

                </td>
              </tr>
              <tr>
                <th>
                  Client Name
                </th>
                <td>
                  @foreach ($clients as $client)
                      @if ($client->id == $rent->client_id)
                          {{$client->name}}
                      @endif
                  @endforeach
                </td>
              </tr>
              <tr>
                <th>
                  Members Count
                </th>
                <td>
                  {{$rent->members}}
                </td>
              </tr>
              <tr>
                <th>
                  Payment
                </th>
                <td>
                  {{$rent->payment}}
                </td>
              </tr>
              <tr>
                <th>
                  Start Date
                </th>
                <td>
                  @php
                    echo date("F j, Y, g:i a",$rent->start_at);
                  @endphp
                </td>
              </tr>
              <tr>
                <th>
                  End Date
                </th>
                <td>
                  @php
                    echo date("F j, Y, g:i a",$rent->end_at);
                  @endphp
                </td>
              </tr>
                @endif

              @endforeach
            </table>
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
