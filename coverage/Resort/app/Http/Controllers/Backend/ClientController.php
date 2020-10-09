<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Auth;
use App\Client;
use App\Location;


class ClientController extends Controller
{
    
    public function __construct()
    {
        
        //create read update delete
        $this->middleware(['permission:read-clients'])->only('index');
        $this->middleware(['permission:create-clients'])->only('create');
        $this->middleware(['permission:update-clients'])->only('update');
        $this->middleware(['permission:delete-clients'])->only('destroy');



    }    
    
    
    public function showLogin()
    {
        return view('auth/loginClient');
    }
    
    public function loginClient(Request $request)
    {
      $remember = request()->has('remember') ? true : false;
        
        
       if(Auth::guard('clients')->attempt(['email' =>request('email') , 'password' => request('password')], $remember))
        {
            
            $data = $request->input('emali');
            setcookie('email' , 'Name' , time() + 1800);

            
            
            /*
            $data = $request->input('emali');

            $request->session()->put('userData' , $data);

            $output = $request->session()->get('userData');

            if(isset($output)){

                $filteruser = filter_var($output , FILTER_SENITIZE_STRING) ;

                $filteremail = filter_var($filteruser , FILTER_SENITIZE_EMAIL);


            } else {
                return session()->flash('Mes' . $data . 'Not Found');
            }
            */
            return redirect('/');

               
        } else {
               return redirect('/');
        } 
                          
    }
    
    
    public function index(Request $request)
    {
        
         $clients = Client::when($request->search, function($query) use($request)
         {
         return $query->where('name', 'Like','%'. $request->search . '%');   
             })->orderBy('name', 'asc')->paginate();
        
        return view('Dashboard.clients.index', compact('clients'));
    }
    
    public function create()
    {
        //
    }

  
    
    public function show($id)
    {
        //
    }
    
    
    
  public function edit($id)
    {
        $client = Client::findOrFail($id);
        
       
        
        return view('Dashboard.clients.edit', compact('client'));
    }
    
    
    public function update(Request $request ,$id)
    {
        $client = Client::findOrFail($id);
        
        $request_data = $request->all();
        
        if(request()->has('password') && request()->get('password') != '')
        {
            $request_data['password'] = ['password' => bcrypt($request->password)];
                 
        }
        $client->update($request_data);
        return redirect()->route('clients.index');
    }
    
    
    public function destroy($id)
    {
        $client = Client::findOrFail($id)->delete();
        
        return redirect()->route('clients.index');
    } 
}
