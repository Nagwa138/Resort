<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\User;
use App\Role;



class UserController extends Controller
{
    
    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:read-users'])->only('index');
        $this->middleware(['permission:create-users'])->only('create');
        $this->middleware(['permission:update-users'])->only('update');
        $this->middleware(['permission:delete-users'])->only('destroy');
        
       
     
    }//end of constructor
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function index(Request $request)
    {
        $users = User::when($request->search, function($query) use($request)
        {
        return $query->where('name', 'Like','%'. $request->search . '%');   
            })->orderBy('name', 'asc')->paginate();
        return view('Dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        
        return view('dashboard.users.create', compact('roles'));
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
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
            'role' => 'required',
            'image' => 'required'    
        ]);
        
        $data = $request->all();
        
        $data = $request->except(['password', 'image','password_confirmation','role']);
        
        $data['password']= bcrypt($request->password);

        if ($request->image)
         {

           Image::make($request->image)->resize(300, null, function ($constraint) {
                  $constraint->aspectRatio();
              })->save(public_path('uploads/users_images/' . $request->image->hashName()));

           $data['image'] = $request->image->hashName();

          }//end of if

         //dd($data);
       $user =  User::create($data);
        $user->attachRole($request->role);
       
      // dd($user);
    //    $user->attachRole('admin');
    //    $user->syncPermissions($request->permissions);
       
       
       $user->save();

        return redirect()->route('users.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$user = User::findOrFail($id);
        
       // return view('Dashboard.users.show', compact('User'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       /*  $user = User::findOrFail($id);
        $roles = Role::get();
        
        //dd($user->roles);
        return view('Dashboard.users.edit', compact('user','roles')); */
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
        $user = User::findOrFail($id);
        
        $data = $request->except(['password', 'image']);

             if($request->image)
             {

              Storage::disk('public_uploads')->delete('/users_images/', $user->image);
             }
               
               Image::make($request->image)->resize(300, null, function ($constraint){
                           $constraint->aspectRatio();
                })->save(public_path('uploads/users_images/' .$request->image->hashName()));

                $data['image'] = $request->image->hashName();
             

             if(request()->has('password') && request()->get('password') != '')
             {
                    $data['password'] = ['password' => bcrypt($request->password)];
             }

            

             $user->update($data);

             $user->syncPermissions($request->permissions);

             return redirect()->route('users.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id)->delete();
          /* if($user->image)
           {
               // Storage::disk('public_uploads')->delete('/users_images/', $user->image);
           }         
        */
        return redirect()->route('users.index');
    }
}
