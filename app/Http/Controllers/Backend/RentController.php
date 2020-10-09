<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

use App\Rent;
use App\Post;
use App\Client;
use App\Location;




class RentController extends Controller
{
    
    
    
    public function __construct()
    {
      
        //create read update delete
        $this->middleware(['permission:read-rents'])->only('index');
        $this->middleware(['permission:create-rents'])->only('create');
        $this->middleware(['permission:update-rents'])->only('update');
        $this->middleware(['permission:delete-rents'])->only('destroy');
        
 
    }//end of constructor
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::when($request->search, function($query) use($request)
        {
                    return $query->where('title', 'Like','%'. $request->search . '%');   
                })->orderBy('title', 'asc')->paginate();
        
        $rents = Rent::paginate();
        
        return view('dashboard.rents.index',compact('posts','rents'));
    }

  
    public function create($id)
    {
      $post = Post::findOrFail($id);
     // dd($post->jobber->name);
      $locations = getLocation();
        
        return view('Dashboard.rents.create', compact('post','locations'));
    }

   
    public function store(Request $request)
    {
        $this->validate($request, [
            "client_id"       => "required",
            "post_id"       => "required",
            "jobber"       => "required",
            "start_at"     => "required",
            "end_at"     => "required",
            "location"   => "required",
        ]);


        $request_data = $request->all();
        //dd($request_data);

        $rent = Rent::create($request_data);

        $rent->save();

        return redirect()->route('home');
    }


    public function show($id)
    {
        $rent = Rent::findOrFail($id);
        return view('dashboard.rents.show',compact('rent'));
    }
    
    public function Approve($id)
    {
        $rent = Rent::findOrFail($id);
        
        $rent->update(['approve'=> 1 ]);
           
        //dd($rent);
       
        return redirect()->route('rents.show', compact('rent'));
    }  
    
    public function NotApprove($id)
    {
        $rent = Rent::findOrFail($id);
        
        $rent->update(['approve' => 2]);
            
        
        return redirect()->route('rents.show', compact('rent'));
    }

    public function edit($id)
    {
        //
    }

   
    public function update(Request $request,post $id)
    {
        //

    }

    
    public function destroy(post $id)
    {
      //
    }
}
