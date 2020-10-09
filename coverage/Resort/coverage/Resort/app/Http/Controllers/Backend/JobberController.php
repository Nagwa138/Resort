<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Jobber;
use App\Location;
use Auth;


class JobberController extends Controller
{
    
    public function showLogin()
    {
        return view('auth/loginJobber');
    }
    
    public function loginJobber()
    {
         $remember = request()->has('remember') ? true : false;
        
    
        if(Auth::guard('jobbers')->attempt(['email' =>request('email') , 'password' => request('password')], $remember))
           {
            
            return redirect('/admin/jobbers');
           
           } else{
               
               return back();
           } 
                          
    }
    
    public function logout()
    {
        Auth::guard('jobbers')->logout();
        return redirect('/jobbers/loginClient');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobbers = Jobber::paginate(10);
        
        
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
         $jobber = Jobber::findOrFail($id);
         
         return view("Dashboard.jobbers.edit", compact('jobber'));
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

             Image::make($request->image)->resize(300, null, function ($constraint){
                         $constraint->aspectRatio();
              })->save(public_path('uploads/jobbers_images/' .$request->image->hashName()));

              $data['image'] = $request->image->hashName();
           }   
           
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
        
        return redirect()->route('jobbers.index'); 
    }
}
