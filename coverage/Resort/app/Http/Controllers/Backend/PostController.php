<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

use notifyhelper;

use App\Post;
use App\Location;
use App\Jobber;



class PostController extends Controller
{
    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:read-posts'])->only('index');
        $this->middleware(['permission:create-posts'])->only('create');
        $this->middleware(['permission:update-posts'])->only('update');
        $this->middleware(['permission:delete-posts'])->only('destroy');
       
        
    }    
        public function index(Request $request)
        {
           
            $posts  = Post::when($request->search, function($query) use($request)
            {
            return $query->where('tilte', 'Like','%'. $request->search . '%');   
                })->orderBy('tilte', 'asc')->paginate();
            
            $jobbers = Jobber::paginate();
    
            return view("Dashboard.posts.index", compact('posts', 'jobbers'));
           
        }
    
        public function create()
        {
            $locations = Location::paginate();
            $jobbers = Jobber::paginate();
            
        
            if($locations->count() <= 0)
            {
                
             return view("Dashboard.location.create");
                
            }else if($jobbers->count() <= 0) {
                
             return view("Dashboard.jobber.create");
            
            }else {    
                   
                return view("Dashboard.posts.create", compact('locations', 'jobbers'));
            }
        
        }
    
    
    
        public function store(Request $request)
        {
    
            $this->validate($request, [
                "image"       => "image|required",
                "title"       => "required|max:255",
                "content"     => "required|max:255",
                "address"     => "required",
                "jobber_id"     => "required",
                
                
    
            ]);
    
    
            $request_data = $request->all();
    
            $request_data = $request->except(['image']);
    
            if($request->image)
            {
                Image::make($request->image)->resize('300', null, function($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('uploads/posts_images/'.$request->image->hashName()));
    
                $request_data['image'] = $request->image->hashName();
            }
    
            //dd($request_data);
    
            $post = Post::create($request_data);
    
            $post->save();
    
            return redirect()->route('posts.index');
        }
    
    
         public function show($id)
        {
            $post = Post::findOrFail($id);
             
            $post->update(['status'=> 1 ]);
             
            return view("Dashboard.posts.show",compact('post'));
        } 
    
        public function edit($id)
        {
            $post = Post::findOrFail($id);
           
    
            return view("Dashboard.posts.edit",compact('post'));
        }
    
    
        public function update(Request $request, $id)
        {
            $post = Post::findOrFail($id);
    
            $request_data = $request->except(['image']);
    
            if($request->image)
            {
                Image::make($request->image)->resize('300', null, function($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('uploads/posts_images/'.$request->image->hashName()));
    
                $request_data['image'] = $request->image->hashName();
            }
    
            $post->update($request_data);
    
            return redirect()->route('posts.index');
    
        }
    
        public function destroy($id)
        {
            $post = Post::findOrFail($id)->delete();
            return redirect()->route('posts.index');
    
        }
    
    
}
