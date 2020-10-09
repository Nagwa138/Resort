@include('Website.navbar')

    <!--DESTINATION-->

    <div class="destination">
        <div class="container">
            <h1>Egypt Destination</h1>
            <div class="row">
            @foreach($posts as $post)
                <div class="col-md-4">
                    <div class="dest">
                        <a href="#">
                            <h2 class="dest-head">{{ $post->address }}</h2>
                            <div class="overlay"></div>
                            <figure><img src="{{ asset($post->image_path) }}"></figure>
                        </a>
                    </div>
                </div>
                
            @endforeach    
            </div>
            
            
            <a href="{{ route('locations') }}" class="btn">View All </a>	

        </div>
    </div>

@include('Website.footer')
