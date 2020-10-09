<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{config('app.name', 'Hotel')}}</title>

    <!-- Styles -->

    
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/backend.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <!--fontawesome style-->
		<link rel="stylesheet" href="{{ asset('css/all.min.css')}}">
		<link rel="stylesheet" href="{{ asset('css/main.css')}}"> 

    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">


</head>
<body>

<!--Navbar -->
<nav class="navbar navbar-expand-lg text-sm-center">
	<div class="container">
		<a class="navbar-brand" href="{{ route('welcome') }}">NSM<span> Tours</span></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				 <i class="fa fa-bars"></i>
			 </button>	

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="{{ route('welcome') }}">Home <span class="sr-only">(current)</span></a>
				</li>
               
               
				<li class="nav-item">
					<a class="nav-link" href="{{ route('locations') }}">Locations</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="page.php">Page</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="contact.php">Contact</a>
				</li>
				
				{{-- SEARCH  --}}
                <li class="nav-item">
                    <div class="searchBox ">
                        @php $route= 'home'; @endphp
						<form action="{{ route($route) }}" method="GET">
							{{csrf_field()}}
							{{ method_field("GET") }}
							<div class="form-group row">
								<div class="col-xs-8">
								<input type="search" name="search" value="{{ request()->search }}" class="searchInput" placeholder="&nbsp;Search">
									
								</div>
							   <div class="col-xs-4">
								<button type="submit" class="searchButton"> <i class="material-icons fa fa-search"> </i></button>
							   
							   </div>
							
							</div>
								
								
							</form>
						
                    </div>
                </li>
                {{-- END OF SEARCH --}}
				
				
                
			</ul>
            
            
              <!-- Right Side Of Navbar -->
              <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                 
                 
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                 </li>
            
                 @if (Route::has('register'))
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
                  
                 @endif
                 @else
				 
                 <li>
                    <img src="{{Auth::user()->image_path}}" class="image-user">

                 </li>

                 <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>




                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                    </div>
					
					
                 </li>
                 
			{{-- NOTIFICATION --}}
				<li class="dropdown notifications-menu nav-item">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-bell-o"></i>
					
					@php $rents = getRent(); @endphp
					
					@if($rents->count() > 0)  
						<span class="label label-danger">{{ $rents->count() }}</span>
					@endif
					
					</a>
				
				<ul class="dropdown-menu">
				<li class="header">You have {{ $rents->count() }} notifications</li>
				<li>
					<!-- inner menu: contains the actual data -->
					<ul class="menu">
					@forelse($rents as $rent)
					<li>
						<a href="{{ route('rentclient', $rent->id) }}">
						<li class="text-aqua row">
						<h5 class="col-xs-6"> New {{ strtoupper(str_limit($rent->post->title, 10)) }} </h5> 
						<div class="col-xs-5">
						<img src="{{ $rent->post->image_path }}" class="img-circle img-thumbnail"> 
							
						</div>
						</li> 
						</a>
					</li>
					
					@empty
					<li> Mot Found Notification</li>
					@endforelse  
					</ul>
				
				</li>
				
				
				</ul>

			</li>
			{{-- END OF NOTIFICATION --}}
                @endguest

                
            </ul>
	
		
		</div>
	</div>
</nav>
<!--END HEADER--->

<!--CAROUSEL -->
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
		<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
		<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner">
		<div class="overlay"></div>
		<div class="carousel-item active">
			<img src="{{ asset('images/alex.jpg') }}" class="d-block w-100" alt="...">
			<div class="carousel-caption d-none d-md-block">
				<h5>Comfortable Choice</h5>
			</div>
		</div>
		<div class="carousel-item">
			<img src="{{ asset('images/matroh.jpg') }}" class="d-block w-100" alt="...">
			<div class="carousel-caption d-none d-md-block">
				<h5>Excellant Organization</h5>
			</div>
		</div>
		<div class="carousel-item">
			<img src="{{ asset('images/ismalia.jpg') }}" class="d-block w-100" alt="...">
			<div class="carousel-caption d-none d-md-block">
				<h5>Special Offers</h5>
			</div>
		</div>
	</div>
</div>  




<!--WELCOME-->
<div class="welcome align-items-center">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="welcome-content">
					<h1> <span>NSM Tours</span></h1>
					<p>Duis vel nisl lacinia, facilisis in, consectetur leon vestibulum et ullamcorper tortor leon placerat mauris tincidunt ut non velit faucibus nam a pretium sapien nunc quis congue purus nunc feugiat nec purus a ultricies suspendisse in fringilla est sodales dui, non mattis tortor volutpat vitae.</p>
				</div>
			</div>
			<div class="col-md-6">
				<img class="img-responsive" src="{{ asset('images/3.jpg') }}" alt="welcome">
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<img class="img-responsive" src="{{ asset('images/3.jpg') }}" alt="welcome">
			</div>
			<div class="col-md-6">
				<div class="welcome-content">
					<h1>Our Vision</h1>
					<p>Duis vel nisl lacinia, facilisis in, consectetur leon vestibulum et ullamcorper tortor leon placerat mauris tincidunt ut non velit faucibus nam a pretium sapien nunc quis congue purus nunc feugiat nec purus a ultricies suspendisse in fringilla est sodales dui, non mattis tortor volutpat vitae.</p>
				</div>
			</div>
			
		</div>
	</div>
</div>

