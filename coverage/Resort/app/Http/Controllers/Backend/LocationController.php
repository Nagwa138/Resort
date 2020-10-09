<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Location;

class LocationController extends Controller
{
    
    
    public function __construct()
    {
        
        //create read update delete
        $this->middleware(['permission:read-locations'])->only('index');
        $this->middleware(['permission:create-locations'])->only('create');
        $this->middleware(['permission:update-locations'])->only('update');
        $this->middleware(['permission:delete-locations'])->only('destroy');


   
    }//end of constructor
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $locations = Location::when($request->search, function($query) use($request)
        {
        return $query->where('location', 'Like','%'. $request->search . '%');   
            })->orderBy('location', 'asc')->paginate();
        
        return view('Dashboard.location.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.location.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           
           'location' => 'required',
           'family'   => 'required', 
        ]);
        
        $location = new Location;
        
        $location->location = $request->location;
        $location->family = $request->family;
        
        $location->save();
        
        return redirect()->route('locations.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location = Location::findOrFail($id);
        
        return view('Dashboard.location.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $location = Location::findOrFail($id);
        
        $data = $request->all();
        
        $location->update($data);    
        
        return view('Dashboard.location.edit', compact('location'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::findOrFail($id)->delete();
        
        return redirect()->back();
    }
}
