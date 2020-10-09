<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $graud = [];
    
    protected $fillable =['jobber_id' ,'image', 'title', 'content', 'address', 'status'];
    
    public function getImagePathAttribute()
    {
        return asset('uploads/posts_images/' . $this->image);

    }//end of get image path
    
    public function jobber()
    {
        return $this->BelongsTo('App\Rent');
    }
    
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    
}
