<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    protected $graud = [];
    
    protected $fillable = ['name', 'email', 'password','image', 'roles'];
    
    public function getImagePathAttribute()
    {
        return  asset('uploads/users_images/' . $this->image);
    }
    
}
