<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
   
    protected $graud = [];
    
    protected $fillable =['post_id','jobber_id','client_id' ,'members', 'status', 'start_at', 'end_at'];

    protected $dates = [
        'created_at',
        'updated_at',
        'start_at', 
        'end_at',
        // your other new column
    ];
   
   public function getImagePathAttribute()
   
   {
         return asset('uploads/posts_images/' . $this->image);
    
   }
   
   
   public function client()
   {
       return $this->BelongsTo('App\Client');
   }
   
   public function post()
   {
       return $this->BelongsTo('App\Post');
   }
   
   public function jobber()
   {
       return $this->BelongsTo('App\Jobber');
   }
    
}
