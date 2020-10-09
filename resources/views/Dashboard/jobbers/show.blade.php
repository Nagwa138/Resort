@extends('Dashboard\Layout\sidebar')

@php 
    $route = 'jobbers';

@endphp 

@section('content')


<div class="card ">

    <div class="card-header ">
        <h4 class="card-title">jobbers</h4>
        <p class="card-category">Number Of jobbers {{$jobber->name}}</p>
    </div>

    <div class="card-body ">
      
     
            <tbody class="cont-data">
              <tr id="{{$jobber->id}}">
               
                <td>{{$jobber->name}}</td>
                <td><img src='{{asset($jobber->image_path)}}' class="photo-user"></td>
                <td>{{$jobber->age}}</td>
                
                <td>{{$jobber->email}}</td>
                <td>{{$jobber->nationalid}}</td>
                <td>{{$jobber->address}}</td>
                <td>{{$jobber->location}}</td>
                
                

           </tbody>
        

    </div>

</div>



@endsection
