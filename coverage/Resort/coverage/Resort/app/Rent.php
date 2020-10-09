<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rent extends Model
{
   
    protected $graud = [];
    
    protected $fillable =['post_id','jobber_id','client_id' ,'members', 'payment', 'start_at', 'end_at'];

    protected $dates = [
        'created_at',
        'updated_at',
        'start_at', 
        'end_at',
        // your other new column
    ];
    
    
}
