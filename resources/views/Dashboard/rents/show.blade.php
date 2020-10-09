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
          <th>Post Title</th>
          
          <th>Post Description</th>

          <th>Jobber's </th>
          
          <th>Starting At</th>
          
          <th>End At</th>
          
         
          <th> Acception</th>

        </tr>
         <tr>
            <td>{{ $rent->post->title }} </td> 
            <td>{{ $rent->post->content }} </td> 
            
            <td>{{ $rent->post->jobber->name }} </td> 
            <td>{{ $rent->start_at }} </td> 
            <td>{{ $rent->end_at }} </td> 
            
            </td>
            <td>
              <a href="{{ route('notapprove', $rent->id) }}"  class="btn btn-default" >Cancel</a>
               
               <a href="{{ route('approve', $rent->id) }}"  class="btn btn-success" >OK</a>
                   
            </td>
            
          </tr>
     
      </table>
    </div>
</div>



@endsection
