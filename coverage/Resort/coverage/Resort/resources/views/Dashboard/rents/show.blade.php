@extends('Dashboard\Layout\sidebar')

@php 
    $route = 'rents';

@endphp 

@section('content')


<div class="card ">

    <div class="card-header ">
        <h4 class="card-title"><i class="fa fa-table"></i>Rents ...</h4>
        
    </div>

    <div class="card-body ">
      <table class="table">
        <tr>
          <th>
            Post Content
          </th>
          
          <th>
            Post Description
          </th>

          <th>
            Jobber's Data
          </th>
          
          <th>
            Starting At
          </th>
          
          <th>
            End At
          </th>
          
          <th>
           Members
          </th>

          <th>
            Acception
          </th>

        </tr>
      @if($rents->count() > 0)
        @foreach ($rents as $rent)
          <tr>
            <td>
              @foreach ($posts as $post)
                  @if ($post->id == $rent->post_id)
                      {{$post->title}}
                      <img src="">
                  @endif
              @endforeach
            </td>
            <td>
              @foreach ($posts as $post)
                  @if ($post->id == $rent->post_id)
                    {{$post->content}}
                  @endif
              @endforeach
            </td>
            <td>
              @foreach ($jobbers as $jobber)
                  @if ($jobber->id == $rent->jobber_id)
                      <h3>Name : {{$jobber->name}}</h3>
                      <h3>Address : {{$jobber->address}}</h3>
                      <h3>National ID : {{$jobber->nationalid}}</h3>
                  @endif
              @endforeach
            </td>
            <td>
              @php
                    echo date("F j, Y, g:i a",$rent->start_at);
              @endphp
            </td>
            <td>
              @php
                    echo date("F j, Y, g:i a",$rent->end_at);
              @endphp
            </td>
            <td>
              Running ...
            </td>
            <td>
              Running ...
            </td>
          </tr>
        @endforeach
      @else 
      <tr>
        <td>You are not renting yet !!</td>
      </tr>
      @endif
      </table>
    </div>
</div>



@endsection
