<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Middleware Clients

Route::get('clients/loginClient', 'Backend\ClientController@showLogin')->name('clientlogin'); 

Route::post('clients/loginClient', 'Backend\ClientController@loginClient')->name('loginClient');      
  
     
     //Middleware Jobbers

Route::get('jobbers/loginJobber', 'Backend\JobberController@showLogin')->name('jobberlogin'); 

Route::post('loginJobber', 'Backend\JobberController@loginJobber')->name('loginJobber');    

//Route::get('jobbers/logout','Backend\JobberController@logoutJobber')->name('logoutJobber');
  

Route::group(['namespace' => 'Backend', 'prefix' => 'admin'], function () {
   
      //ROUTE FOR REGISTER 
      
      Route::get('register', 'ClientController@create')->name('register.create'); 
   
   
      //ROUTE FOR USERS 
          
         Route::resource('users','UserController');      

      //ROUTE FOR CLIENTS 
          
        Route::resource('clients','ClientController');
        
              

        //ROUTE FOR JOBBERS 
          
         Route::resource('jobbers','JobberController');      

        //ROUTE FOR Location 

          Route::resource('locations','LocationController');     
          
         //ROUTE FOR POSTS
            
         Route::resource('posts','PostController');      
         
         
         //ROUTE FOR RENTS
            
        
         Route::resource('rents','RentController')->except(['create']);         
   
        Route::get('rents/create/{id}','RentController@create')->name('rents.create');         
   
    
}); 


Route::get('/home', 'HomeController@index')->name('home');
