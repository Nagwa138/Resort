<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Jobber;
use App\Location;
use App\Rent;

use Auth;


class JobberController extends Controller
{
    
    
    public function __construct()
    {
        
        //create read update delete
        $this->middleware(['permission:read-jobbers'])->only('index');
        $this->middleware(['permission:create-jobbers'])->only('create');
        $this->middleware(['permission:update-jobbers'])->only('update');
        $this->middleware(['permission:delete-jobbers'])->only('destroy');
        
        
        
    }//end of constructor
    
    
    public function showLogin()
    {
        return view('auth/loginJobber');
    }
    
    public function loginJobber(Request $request)
    {
      $remember = request()->has('remember') ? true : false;
        
        
        
        
       if(Auth::guard('jobbers')->attempt(['email' =>request('email') , 'password' => request('password')], $remember))
        {
            
          /*   $data = $request->input('email');
        
            $request->session()->put('userData', $data);
            
            $outPut =  $request->session()->get('userData');
            
            
            if(isset($outPut))
            {
                
                $filteruser = filter_var($outPut, FILTER_SANITIZE_STRING);
                
                $filteremail = filter_var($outPut, FILTER_SANITIZE_EMAIL);

                
            }else{
                
               return session()->flash('mes', $data . ' Not Found Here');
            }
            */
           
            return redirect('/');
        
               
        } else{
               
               return back();
        } 
                          
    }
    
    public function logoutJobber()
    {
        Auth::guard('jobbers')->logout();
        return redirect('/jobbers/loginClient');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jobbers = Jobber::when($request->search, function($query) use($request)
        {
        return $query->where('name', 'Like','%'. $request->search . '%');   
            })->orderBy('name', 'asc')->paginate();
        
        
        return view("Dashboard.jobbers.index", compact('jobbers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $locations = Location::get();
        
        if($locations->count() <= 0)
        {
        return view("Dashboard.location.create");

        }else {
           
            return view("Dashboard.jobbers.create", compact('locations'));

        }
        
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
            'name' => 'required',
            'email' => 'required|unique:jobbers',
            'age' => 'required',
            'address' => 'required',
            'password' => 'required|confirmed',
            'image' => 'required|image',
            'nationalid' => 'required|unique:jobbers|min:14',
            
        ]);
        
        
        $data = $request->all();
        
        $data = $request->except(['image', 'password', 'password_confirm']);
           
        $data['password'] = bcrypt($request->password);
        
        if ($request->image)
        {

          Image::make($request->image)->resize(300, null, function ($constraint) {
                 $constraint->aspectRatio();
             })->save(public_path('uploads/jobbers_images/' . $request->image->hashName()));

          $data['image'] = $request->image->hashName();

         }//end of if    
    
         $jobber =  Jobber::create($data);

        // dd($data);
         $jobber->save();
         
         return redirect()->route('jobbers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jobber = Jobber::findOrFail($id);
        return view('dashboard.jobbers.show', compact('jobber'));
    }

  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $jobber = Jobber::findOrFail($id);
        
         $locations = getLocation();
         
         
         return view("Dashboard.jobbers.edit", compact('jobber', 'locations'));
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
        $jobber = Jobber::findOrFail($id);
        $data = $request->all();
        
        $data = $request->except(['image', 'password']);
    
        if(request()->has('password') && request()->get('password') != '')
           {
               
            $data['password'] = ['password' => bcrypt($request->password)];

           }
           
           if($request->image)
           {

             Storage::disk('public_uploads')->delete('/jobbers_images/', $user->image);
           }
             Image::make($request->image)->resize(300, null, function ($constraint){
                         $constraint->aspectRatio();
              })->save(public_path('uploads/jobbers_images/' .$request->image->hashName()));

              $data['image'] = $request->image->hashName();
              
           
           $jobber->update($data);

             

             return redirect()->route('jobbers.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jobber = Jobber::findOrFail($id)->delete();  
        if($jobber->image)
        {
            Storage::disk('public_uploads')->delete('/jobbers_images/', $user->image);
            
        }
        return redirect()->route('jobbers.index'); 
    }
}
