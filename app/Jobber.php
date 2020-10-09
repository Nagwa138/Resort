<?php

namespace App;



use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Jobber extends Authenticatable
{
    use Notifiable;  
    
    protected $graud = ['jobbers'];
    
    protected $fillable =['name', 'email', 'password', 'age', 'address' , 'nationalid', 'image'];
    
    public function getImagePathAttribute()
    {
        return asset('uploads/jobbers_images/' . $this->image);

    }//end of get image path
    
    
    
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
