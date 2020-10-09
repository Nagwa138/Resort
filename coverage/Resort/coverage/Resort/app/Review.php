<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $graud = [];
    
    protected $fillable =['client_id', 'post_id','reviewtext', 'like', 'dislike'];
    
    
    public function client()
    {
        return $this->belongsTo('App\Client');
    }
    
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
    
   
}
