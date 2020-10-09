<?php

namespace App\Http\Controllers\Forntend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use App\Rent;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::paginate();
        return view('home', compact('posts'));
    }
    
    public function Locations()
    {
        $posts = Post::paginate();
        return view('Website.locations', compact('posts'));
    }
    
    
    public function ShowLocation($id)
    {
        $post = Post::findOrFail($id);
        $locations = getLocation();
        return view('Website.location', compact('post', 'locations'));
    }
    
    
    public function RentClient($id)
    {
        $rent = Rent::findOrFail($id);
        if($rent->approve == 2)
        {
            $rent->delete();            
        
        } elseif($rent->approve == 1)
        {
            return view('Website.rentclient',compact('rent'));
            
        }
        return view('Website.rentclient',compact('rent'));

    
    }
}
