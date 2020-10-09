<?php

 use \App\Post as post;
 
 use \App\Rent as rent;
 
 
 
 if(! function_exists('getPost'))
 {
     function getPost($type = 'data')
     {
         if($type == 'data')
         {
             
            $post = Post::where('status', 0)->orderBy('created_at', 'desc')->get();
            
         }else {
             
            $post = Post::where('status', 0)->count();
             
         }
         return $post;
         
         
     } // end of function
 }// end of if 
 
 
 if(! function_exists('getRent'))
 {
     function getRent($type = 'data')
     {
         if($type == 'data')
         {
             
            $rent = Rent::where('status', 0)->orderBy('created_at', 'desc')->get();
            
         }else {
             
            $rent = Rent::where('status', 0)->count();
             
         }
         return $rent;
         
         
     } // end of function
 }// end of if 
 
 
 ?>