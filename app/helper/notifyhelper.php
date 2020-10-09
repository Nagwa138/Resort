<?php

 use \App\Post as post;
 
 use \App\Rent as rent;
 
 
 
 if(! function_exists('getPost'))
 {
     function getRentJobber($type = 'data')
     {
         if($type == 'data')
         {
             
            $rent = Rent::where('approve', 0)->orderBy('created_at', 'desc')->get();
            
         }else {
             
            $rent = Rent::where('approve', 0)->count();
             
         }
         return $rent;
         
         
     } // end of function
 }// end of if 
 
 
 if(! function_exists('getRent'))
 {
     function getRent($type = 'data')
     {
         if($type == 'data')
         {
             
            $rent = Rent::where('approve', 1)->Orwhere('approve', 2)->orderBy('created_at', 'desc')->get();
            
         }else {
             
            $rent = Rent::where('approve', 1)->Orwhere('approve', 2)->count();
             
         }
         return $rent;
         
         
     } // end of function
 }// end of if 
 
 
 ?>