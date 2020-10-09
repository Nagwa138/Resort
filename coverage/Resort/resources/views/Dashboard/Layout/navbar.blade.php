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

                    <li class="nav-item">
                        <a href="#" class="nav-link" data-toggle="dropdown">
                            <i class="nc-icon nc-palette"></i>
                            <span class="d-lg-none">Dashboard</span>
                        </a>
                    </li>

                    <li class="dropdown nav-item">
                    
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <i class="nc-icon nc-planet"></i>

                          @php $posts = getPost() @endphp
                          
                          @if(getPost()->count() > 0 )
                            
                            <span class="notification">{{ getPost()->count() }}</span>                          
                         
                         @endif
                            
                        </a>
                        
                        <ul class="dropdown-menu">
                        @forelse (getPost() as $post)
                          <li>
                           
                           <a href="{{ route('posts.show', $post->id) }}">
                           
                             <div class="pull-left">
                                <img src="{{ asset($post->image_path) }}" class="img-circle">
                             </div>
                            
                             <h4>
                              {{ $post->title }}
                             <small><i class="fa fa-clock-o"></i>{{ $post->created_at->diffForHumans() }}</small>
                             </h4>
                              
                             <p>{{ str_limit($post->content, 100) }}</p>
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
                   
                </ul>

                <div class="search" style="position: relative; top: 22px;">
                    
                    <form action="{{ route( $route . '.index' )}}" method="GET">
                       {{csrf_field()}}
                       {{ method_field("GET") }}
                       <div class="form-group row">
                        <div class="col-sm-8">   
                         <input type="search" name="search" value="{{ request()->search }}" class="form-control" placeholder="&nbsp;Search">
                        </div>
                        <div class="col-sm-4">
                          <button type="submit" class="btn btn-primary">Search</button>
                        </div>

                       </div> 
                      </form>
                      
                   </div>


                <ul class="navbar-nav ml-auto">
                     <!-- Authentication Links -->
                   
                    @if ( Auth::guard('clients') )
                       
                        <li class="nav-item dropdown">
                           
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                           {{-----     {{ Auth::guard('clients')->user()->name }} <span class="caret"></span>
                        -----}}    
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
                        
                    @elseif( Auth::guard('jobbers') )  
                        
                        <li class="nav-item dropdown">
                         <img src="{{Auth::guard('jobbers')->user()->image_path}}" class="image-user" style="margin:21px 0px;">

                         <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::guard('jobbers')->user()->name }} <span class="caret"></span>
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
                   
                    @else
                       
                       <li class="nav-item dropdown">
                        <img src="{{Auth::user()->image_path}}" class="image-user" style="margin:21px 0px;">

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
                </ul>


            </div>
        </div>
    </nav>
    <!-- End Navbar -->
