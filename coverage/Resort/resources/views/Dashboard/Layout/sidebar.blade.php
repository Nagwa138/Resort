<html lang="en">

<head>

    <meta charset="utf-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{!! csrf_token() !!}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">

    <link rel="icon" type="image/png" href="{{asset('img/favicon.ico')}}">


    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

    <!-- CSS Files -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/light-bootstrap-dashboard.css?v=2.0.0')}} " rel="stylesheet" />
    
    <!--Sweet alert -->
    
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>

    <!-- CSS Just for demo purpose, dont include it in your project -->
    <link href="{{asset('css/demo.css')}}" rel="stylesheet" />
    <link href="{{asset('css/backend.css')}}" rel="stylesheet" />
    

</head>

<body>

    
    <div class="wrapper">
        <div class="sidebar" data-image="{{asset('img/sidebar-5.jpg')}}">

            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    
                    @if( Auth::user()->hasPermission('read-users') || Auth::user()->hasRole('admin users') )
                         
                    <li class="nav-item {{is_active('users')}}">
                        <a class="nav-link" href="{{route('users.index')}}">
                            <i class="fa fa-user-o"></i>
                            <p> Admins</p>
                        </a>
                    </li>
                    
                    @endif
                    
                    @if( Auth::user()->hasPermission('read-clients') || Auth::user()->hasRole('admin clients') )
                    
                    <li class="nav-item {{is_active('clients')}}">
                        <a class="nav-link" href="{{route('clients.index')}}">
                            <i class="fa fa-users"></i>
                            <p>Client</p>
                        </a>
                    </li>
                    
                    @endif
                    
                    @if( Auth::user()->hasPermission('read-posts') || Auth::user()->hasRole('admin posts') )
                    
                    <li class="nav-item {{is_active('posts')}}">
                        <a class="nav-link" href="{{route('posts.index')}}">
                            <i class="fa fa-flag"></i>
                            <p>post</p>
                        </a>
                    </li>
                    
                    @endif
                    
                    @if( Auth::user()->hasPermission('read-jobbers') || Auth::user()->hasRole('admin jobbers') )
                   
                    <li class="nav-item {{is_active('jobbers')}}">
                        <a class="nav-link" href="{{route('jobbers.index')}}">
                            <i class="fa fa-users"></i>
                            <p>Jobbers</p>
                        </a>
                    </li>
                   
                   @endif
                   
                    @if( Auth::user()->hasPermission('read-rents') || Auth::user()->hasRole('admin rents') )
                    
                    <li class="nav-item {{is_active('rents')}}">
                        <a class="nav-link" href="{{route('rents.index')}}">
                            <i class="fa fa-users"></i>
                            <p>Rents</p>
                        </a>
                    </li>
                    
                    @endif
                    
                    @if( Auth::user()->hasPermission('read-locations') || Auth::user()->hasRole('admin locations') )
                    
                    <li class="nav-item {{is_active('locations')}}">
                        <a class="nav-link" href="{{route('locations.index')}}">
                            <i class="fa fa-map-marked-alt"></i>
                            <p>Locations</p>
                        </a>
                    </li>
                  
                  @endif
                  
                  
                </ul>
            </div>


        </div>

        @include('Dashboard\Layout\navbar')
        @include('Dashboard\Layout\footer')


    </div>
