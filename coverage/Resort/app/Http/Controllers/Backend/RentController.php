<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use notifyhelper;

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
                    return $query->where('name', 'Like','%'. $request->search . '%');   
                })->orderBy('name', 'asc')->paginate();
        
        $rents = DB::table('rents')->get();
        return view('dashboard.rents.index',compact('posts','rents'));
    }

  
    public function create($id)
    {
      $post = Post::findOrFail($id);
      $locations = Location::get();
        
        return view('Dashboard.rents.create', compact('post','locations'));
    }

   
    public function store(Request $request)
    {
        
        $this->validate($request, [
            "client_id"       => "required",
            "post_id"       => "required",
            "start_at"     => "required",
            "end_at"     => "required",
            "jobber_id"   => "required",
            "members"   => "required",
        ]);


        $request_data = $request->all();
        //dd($request_data);

        $rent = Rent::create($request_data);

        $rent->save();

        return redirect()->route('rents.index');
    }


    public function show(client $id)
    {
        $client_id = $id->id;
        $rents = DB::table('rents')->where('client_id', $client_id)->orderBy('created_at','desc')->get();
        $posts = DB::table('posts')->get();
        $jobbers = DB::table('jobbers')->get();
        return view('dashboard.rents.show',compact('rents','posts','jobbers'));
    }

    public function edit($id)
    {
        //
    }

   
    public function update(Request $request,post $id)
    {
        $post_id = $id->id;

        DB::table('rents')->where('post_id',$post_id)->delete();

        return redirect()->back();

    }

    
    public function destroy(post $id)
    {
        $post_id = $id->id;
        return view('dashboard.rents.delete',compact('post_id'));
    }
}
