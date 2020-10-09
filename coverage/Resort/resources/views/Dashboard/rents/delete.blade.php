@extends('Dashboard\Layout\sidebar')

@php 
    $route = 'posts';

@endphp 

@section('content')


<div class="card ">
<h1>
Delete this item ?
</h1>

<form action="{{ route($route. '.update', ['id' => $post_id]) }}" method="POST"  enctype="multipart/form-data">
  {{ csrf_field() }}
  {{ method_field("POST") }}
        <button type="submit" class="btn btn-primary update" >Save changes</button>
</form>

</div>
@endsection