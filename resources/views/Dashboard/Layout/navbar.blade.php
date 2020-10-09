<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="500">
        <div class="container-fluid">
            <a class="navbar-brand" href="#pablo"> Dashboard </a>
            <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
                <!--Right List-->
                <ul class="nav navbar-nav mr-auto">


                    <li class="dropdown nav-item">
                    
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <i class="nc-icon nc-planet"></i>
                            
                          @php $rents = getRentJobber() @endphp
                          
                          @if($rents->count() > 0 )
                            
                            <span class="notification">{{ $rents->count() }}</span>                          
                         
                         @endif
                            
                        </a>
                        
                        <ul class="dropdown-menu">
                            @forelse ($rents as $rent)
                            <li>
                            
                            <a href="{{ route('rents.show', $rent->id) }}">
                            
                                <div class="pull-left">
                                    <img src="{{ asset($rent->post->image_path) }}" class="image-user">
                                </div>
                                
                                <h4>
                                {{ $rent->post->title }}
                                <small><i class="fa fa-clock-o"></i>{{ $rent->created_at->diffForHumans() }}</small>
                                </h4>
                                
                                <p>{{ str_limit($rent->post->content, 100) }}</p>
                            </a>
                            </li> 
                             
                           
                            @empty
                            
                            
                            <li>
                                <a href="#">
                                <p>NO Notification</p>
                                </a>   
                            </li>    
                            @endforelse
                            
                        </ul>
                
                    </li>
                
                    <li class="nav-item">
                    <div class="search" style="position: absolute">
                        <form action="{{ route($route.'.index' ) }}" method="GET" class="nav-link">
                            {{csrf_field()}}
                            {{ method_field("GET") }}
                            <div class="form-group row">
                                <div class="col-xs-8">
                                <input type="search" name="search" value="{{ request()->search }}" class="form-control" placeholder="&nbsp;Search">
                                    
                                </div>
                               <div class="col-xs-4">
                                <button type="submit" class="btn btn-primary"><i class="nc-icon nc-zoom-split"></i></button>
                               
                               </div>
                            
                            </div>
                                
                                
                            </form>
                    
                    </div>
                    
                        
                    
                    </li>
                    
                </ul>


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
                     @endif
                     
                 @else
                     <li class="nav-item dropdown">
                        <img src="{{Auth::user()->image_path}}" class="image-user">
                     
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
                     
                 @endguest
                        
                       </li>
                       
                </ul>


            </div>
        </div>
    </nav>
    <!-- End Navbar -->
