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
    public function showLogin()
    {
        return view('auth/loginClient');
    }
    
    public function loginClient()
    {
         $remember = request()->has('remember') ? true : false;
        
    
        if(Auth::guard('clients')->attempt(['email' =>request('email') , 'password' => request('password')], $remember))
           {
            
            return redirect('/admin/clients');

           
           } else{
               return back();
           } 
                          
    }
    public function logout()
    {
        Auth::guard('clients')->logout();
        return redirect('/clients/loginClient');
    }
     public function index()
     {
        
         $clients = Client::paginate();
        
        return view('Dashboard.clients.index', compact('clients'));
    }
    
    public function create()
    {
        return view('auth.register');
    }

  
    
    public function show($id)
    {
        //
    }
    
    
    
  public function edit($id)
    {
        $client = Client::findOrFail($id);
        
        $locations = Location::get();
        
        return view('Dashboard.clients.edit', compact('client','locations'));
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
