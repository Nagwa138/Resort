@include('Website.navbar')

<div class="sub-page">
    <h1 class="text-center">Rants</h1>
    <div class="container">
        <div class="row">
        
            <div class="col-xs-12">
    
                
                
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
                          @if($rent->approve == 1)
                            <h3>Approved Request</h3>
                            
                          
                          @elseif($rent->approve == 2)
                          <h3>Canceled Request </h3>
                          
                          @else
                          <h3>Loading......</h3>
                          
                          @endif
                               
                        </td>
                        
                      </tr>
                 
                  </table>
                      
                
            </div>
    
          
        </div>
    </div>
</div>

   
@include('Website.footer')
