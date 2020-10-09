<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Jobber extends Authenticatable
{
    protected $graud = [];
    
    protected $fillable =['name', 'email', 'password', 'age', 'address', 'location' , 'nationalid', 'image'];
    
    public function getImagePathAttribute()
    {
        return asset('uploads/users_images/' . $this->image);

    }//end of get image path
 
 
    public function posts()
    {
        return $this->hasMany('App\Post', 'jobber_id');
    }
   
    
}
