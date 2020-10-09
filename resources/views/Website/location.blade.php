@include('Website.navbar')

<div class="sub-page">
    <h1 class="text-center">Locations</h1>
    <div class="container">
        <div class="row">
        
            <div class="col-xs-12">
                <div class="content">
                   <h3>{{ $post->address }}</h3>
                   <h5>{{ $post->title }}</h5>
                   
                    <img src="{{ asset($post->image_path) }}">
                    <p> {{ $post->content }} impedit recusandae numquam aut eaque alias est? Non, illum aperiam! Et, amet.</p>
                
                    {{--  <ul class="list-unstyled">
                        <li><svg class="svg-inline--fa fa-bed fa-w-20 fa-1x" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="bed" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><path fill="currentColor" d="M176 256c44.11 0 80-35.89 80-80s-35.89-80-80-80-80 35.89-80 80 35.89 80 80 80zm352-128H304c-8.84 0-16 7.16-16 16v144H64V80c0-8.84-7.16-16-16-16H16C7.16 64 0 71.16 0 80v352c0 8.84 7.16 16 16 16h32c8.84 0 16-7.16 16-16v-48h512v48c0 8.84 7.16 16 16 16h32c8.84 0 16-7.16 16-16V240c0-61.86-50.14-112-112-112z"></path></svg><!-- <i class="fa fa-bed fa-1x"></i> -->2 beds</li>
                        <li><svg class="svg-inline--fa fa-snow fa-w-16 fa-1x" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="snow" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><g><path fill="currentColor" d="M156.5,447.7l-12.6,29.5c-18.7-9.5-35.9-21.2-51.5-34.9l22.7-22.7C127.6,430.5,141.5,440,156.5,447.7z M40.6,272H8.5 c1.4,21.2,5.4,41.7,11.7,61.1L50,321.2C45.1,305.5,41.8,289,40.6,272z M40.6,240c1.4-18.8,5.2-37,11.1-54.1l-29.5-12.6 C14.7,194.3,10,216.7,8.5,240H40.6z M64.3,156.5c7.8-14.9,17.2-28.8,28.1-41.5L69.7,92.3c-13.7,15.6-25.5,32.8-34.9,51.5 L64.3,156.5z M397,419.6c-13.9,12-29.4,22.3-46.1,30.4l11.9,29.8c20.7-9.9,39.8-22.6,56.9-37.6L397,419.6z M115,92.4 c13.9-12,29.4-22.3,46.1-30.4l-11.9-29.8c-20.7,9.9-39.8,22.6-56.8,37.6L115,92.4z M447.7,355.5c-7.8,14.9-17.2,28.8-28.1,41.5 l22.7,22.7c13.7-15.6,25.5-32.9,34.9-51.5L447.7,355.5z M471.4,272c-1.4,18.8-5.2,37-11.1,54.1l29.5,12.6 c7.5-21.1,12.2-43.5,13.6-66.8H471.4z M321.2,462c-15.7,5-32.2,8.2-49.2,9.4v32.1c21.2-1.4,41.7-5.4,61.1-11.7L321.2,462z M240,471.4c-18.8-1.4-37-5.2-54.1-11.1l-12.6,29.5c21.1,7.5,43.5,12.2,66.8,13.6V471.4z M462,190.8c5,15.7,8.2,32.2,9.4,49.2h32.1 c-1.4-21.2-5.4-41.7-11.7-61.1L462,190.8z M92.4,397c-12-13.9-22.3-29.4-30.4-46.1l-29.8,11.9c9.9,20.7,22.6,39.8,37.6,56.9 L92.4,397z M272,40.6c18.8,1.4,36.9,5.2,54.1,11.1l12.6-29.5C317.7,14.7,295.3,10,272,8.5V40.6z M190.8,50 c15.7-5,32.2-8.2,49.2-9.4V8.5c-21.2,1.4-41.7,5.4-61.1,11.7L190.8,50z M442.3,92.3L419.6,115c12,13.9,22.3,29.4,30.5,46.1 l29.8-11.9C470,128.5,457.3,109.4,442.3,92.3z M397,92.4l22.7-22.7c-15.6-13.7-32.8-25.5-51.5-34.9l-12.6,29.5 C370.4,72.1,384.4,81.5,397,92.4z"></path><circle fill="currentColor" cx="256" cy="364" r="28"><animate attributeType="XML" repeatCount="indefinite" dur="2s" attributeName="r" values="28;14;28;28;14;28;"></animate><animate attributeType="XML" repeatCount="indefinite" dur="2s" attributeName="opacity" values="1;0;1;1;0;1;"></animate></circle><path fill="currentColor" opacity="1" d="M263.7,312h-16c-6.6,0-12-5.4-12-12c0-71,77.4-63.9,77.4-107.8c0-20-17.8-40.2-57.4-40.2c-29.1,0-44.3,9.6-59.2,28.7 c-3.9,5-11.1,6-16.2,2.4l-13.1-9.2c-5.6-3.9-6.9-11.8-2.6-17.2c21.2-27.2,46.4-44.7,91.2-44.7c52.3,0,97.4,29.8,97.4,80.2 c0,67.6-77.4,63.5-77.4,107.8C275.7,306.6,270.3,312,263.7,312z"><animate attributeType="XML" repeatCount="indefinite" dur="2s" attributeName="opacity" values="1;0;0;0;0;1;"></animate></path><path fill="currentColor" opacity="0" d="M232.5,134.5l7,168c0.3,6.4,5.6,11.5,12,11.5h9c6.4,0,11.7-5.1,12-11.5l7-168c0.3-6.8-5.2-12.5-12-12.5h-23 C237.7,122,232.2,127.7,232.5,134.5z"><animate attributeType="XML" repeatCount="indefinite" dur="2s" attributeName="opacity" values="0;0;1;1;0;0;"></animate></path></g></svg><!-- <i class="fa fa-snow fa-1x"></i> -->AC</li>
                        <li><svg class="svg-inline--fa fa-tv fa-w-20 fa-1x" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="tv" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><path fill="currentColor" d="M592 0H48A48 48 0 0 0 0 48v320a48 48 0 0 0 48 48h240v32H112a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16H352v-32h240a48 48 0 0 0 48-48V48a48 48 0 0 0-48-48zm-16 352H64V64h512z"></path></svg><!-- <i class="fa fa-tv fa-1x"></i> -->TV</li>
                        <li><svg class="svg-inline--fa fa-wifi fa-w-20 fa-1x" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="wifi" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><path fill="currentColor" d="M634.91 154.88C457.74-8.99 182.19-8.93 5.09 154.88c-6.66 6.16-6.79 16.59-.35 22.98l34.24 33.97c6.14 6.1 16.02 6.23 22.4.38 145.92-133.68 371.3-133.71 517.25 0 6.38 5.85 16.26 5.71 22.4-.38l34.24-33.97c6.43-6.39 6.3-16.82-.36-22.98zM320 352c-35.35 0-64 28.65-64 64s28.65 64 64 64 64-28.65 64-64-28.65-64-64-64zm202.67-83.59c-115.26-101.93-290.21-101.82-405.34 0-6.9 6.1-7.12 16.69-.57 23.15l34.44 33.99c6 5.92 15.66 6.32 22.05.8 83.95-72.57 209.74-72.41 293.49 0 6.39 5.52 16.05 5.13 22.05-.8l34.44-33.99c6.56-6.46 6.33-17.06-.56-23.15z"></path></svg><!-- <i class="fa fa-wifi fa-1x"></i> -->Wi-fi</li>
                        <li><svg class="svg-inline--fa fa-car fa-w-16 fa-1x" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="car" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M499.99 176h-59.87l-16.64-41.6C406.38 91.63 365.57 64 319.5 64h-127c-46.06 0-86.88 27.63-103.99 70.4L71.87 176H12.01C4.2 176-1.53 183.34.37 190.91l6 24C7.7 220.25 12.5 224 18.01 224h20.07C24.65 235.73 16 252.78 16 272v48c0 16.12 6.16 30.67 16 41.93V416c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32v-32h256v32c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32v-54.07c9.84-11.25 16-25.8 16-41.93v-48c0-19.22-8.65-36.27-22.07-48H494c5.51 0 10.31-3.75 11.64-9.09l6-24c1.89-7.57-3.84-14.91-11.65-14.91zm-352.06-17.83c7.29-18.22 24.94-30.17 44.57-30.17h127c19.63 0 37.28 11.95 44.57 30.17L384 208H128l19.93-49.83zM96 319.8c-19.2 0-32-12.76-32-31.9S76.8 256 96 256s48 28.71 48 47.85-28.8 15.95-48 15.95zm320 0c-19.2 0-48 3.19-48-15.95S396.8 256 416 256s32 12.76 32 31.9-12.8 31.9-32 31.9z"></path></svg><!-- <i class="fa fa-car fa-1x"></i> -->Parking</li>

                     </ul>
                  --}}
                    
                </div>
                <hr>
                <div class="content-author">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{ asset($post->jobber->image_path) }}" class="image-user">
                           
                        </div>
                        
                        
                        <div class="col-md-9">
                            <a href="">{{strtoupper ($post->jobber->name) }}</a>
                            <p>{{ $post->jobber->email}}</p>
                        </div>
                        
                        <div class="col-xs-12">
                            <form action="{{ route('rents.store')}}" method="post">
                                {{ csrf_field() }}
                               {{ method_field("POST") }}
                             
                             
                             
                               <div class="form-group row">
                                <div class="col-xs-12">
                                
                                 <input  type="hidden" name="post_id" class="form-control"  value="{{ $post->id }}" >
                                 <input  type="hidden" name="jobber" class="form-control "  value="{{ $post->jobber->name }}" >
                                 <input  type="hidden" name="client_id" class="form-control " value="{{  Auth::user()->id }}" >
                                 
                                </div>
                               </div>
                             
                             
                                 
                                 <div class="form-group row">
                                  <div class="col-xs-12 mb-3 mb-sm-0">
                                   <input  class="form-control  @error('location') is-invalid @enderror" name="location" value="{{ $post->address }}">
                                   
                                     @error('location')
                                      <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                      </span>
                                     @enderror
                                  </div>
                                 </div>
                             
                                  <div class="form-group row">
                                   <div class="col-xs-12 mb-3 mb-sm-0">
                                    <input  type="date" name="start_at" class="form-control start_at @error('start_at') is-invalid @enderror"  value="{{ old('start_at') }}" >
                                    
                                    @error('start_at')
                                     <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                     </span>
                                    @enderror
                                   </div>
                                  </div>
                                  
                                  <div class="form-group row">
                                   <div class="col-xs-12 mb-3 mb-sm-0">
                                      <input  type="date" name="end_at" class="form-control end_at @error('end_at') is-invalid @enderror"  value="{{ old('end_at') }}" >
                                      
                                      @error('end_at')
                                      <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                      </span>
                                      @enderror
                                   </div>
                                  </div>
                                   
                                   <button type="submit" class="btn btn-primary" >RENT</button>
                              </form>
                             
                        </div>
                        
                    </div>
                </div>
            </div>
    
          
        </div>
    </div>
</div>

   
@include('Website.footer')
