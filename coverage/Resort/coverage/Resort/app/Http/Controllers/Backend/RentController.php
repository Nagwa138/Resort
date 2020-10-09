<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\User;
use App\Role;

use App\rent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Client;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::table('posts')->get();
        $rents = DB::table('rents')->get();
        $clients = DB::table('clients')->get();
        $jobbers = DB::table('jobbers')->get();
        return view('Dashboard.rents.index',compact('posts','rents','clients','jobbers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $jobber_id = $request->jobber_id;
        $client_id = $request->client_id;
        $post_id = $request->post_id;
        return view('dashboard.rents.create', compact('jobber_id','client_id','post_id'));
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
            "client_id"       => "required",
            "post_id"       => "required",
            "start_at"     => "required",
            "end_at"     => "required",
            "jobber_id"   => "required",
            "members"   => "required",
        ]);


        $request_data = $request->all();
        //dd($request_data);

        $rent = rent::create($request_data);

        $rent->save();

        return redirect()->route('rents.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(client $id)
    {
        $client_id = $id->id;
        $rents = DB::table('rents')->where('client_id', $client_id)->orderBy('created_at','desc')->get();
        $posts = DB::table('posts')->get();
        $jobbers = DB::table('jobbers')->get();
        return view('dashboard.rents.show',compact('rents','posts','jobbers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,post $id)
    {
        $post_id = $id->id;

        DB::table('rents')->where('post_id',$post_id)->delete();

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $id)
    {
        $post_id = $id->id;
        return view('dashboard.rents.delete',compact('post_id'));
    }
}
