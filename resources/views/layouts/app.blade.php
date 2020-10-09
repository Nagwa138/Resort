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

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/backend.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">


</head>
<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                         <li class="nav-item">
                            <a class="nav-link" href="{{ route('loginClient') }}">{{ __('loginClient') }}</a>
                          </li>
                            
                         
                         <li class="nav-item">
                            <a class="nav-link" href="{{ route('loginJobber') }}">{{ __('loginJobber') }}</a>
                          </li>
                         
                         
                         
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                         </li>
                    
                         @if (Route::has('register'))
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                          </li>
                          
                         @elseif(Auth::guard('clients'))
                       
                         <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::guard('clients')->user()->name }} <span class="caret"></span>
                                </a>

                            {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logoutClient') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('LogoutClient') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logoutClient') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </div>
                             --}}
                         </li>
                        
                         @elseif(Auth::guard('jobbers'))
                         <li>
                            <img src="{{Auth::guard('jobbers')->user()->image_path}}" class="image-user">

                         </li>
                         <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::guard('jobbers')->user()->name }} <span class="caret"></span>
                                </a>

                            {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logoutJobber') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('LogoutJobber') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logoutJobber') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </div>
                             --}}
                         </li>
                         
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
                         @endif
                         
                        @endguest

                        
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{asset('js/backend.js')}}"></script>

</body>
</html>
