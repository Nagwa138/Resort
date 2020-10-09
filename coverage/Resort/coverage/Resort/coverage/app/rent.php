<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rent extends Model
{
   
    protected $graud = [];
    
    protected $fillable =['members', 'payment', 'start_at', 'end_at'];
   
    
}
