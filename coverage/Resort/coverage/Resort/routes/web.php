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

Route::get('s', 'SweetController@index');


//Middleware Clients

Route::get('clients/loginClient', 'Backend\ClientController@showLogin')->name('clientlogin'); 

Route::post('loginClient', 'Backend\ClientController@loginClient')->name('loginClient');      
     
Route::get('clients/logout','Backend\ClientController@logout')->name('logout');
     
     //Middleware Jobbers

Route::get('jobbers/loginJobber', 'Backend\JobberController@showLogin')->name('jobberlogin'); 

Route::post('jobbers/loginJobber', 'Backend\JobberController@loginJobber')->name('loginJobber');    

Route::get('jobbers/logout','Backend\JobberController@logout')->name('logout');
  

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
            
         Route::resource('rents','RentController');      
         
         // Route::resource('likes','LikeController');      
         Route::get('likes','LikeController@index')->name('likes.index');  

         // Route::resource('rents','RentController');      
         Route::get('rents','RentController@index')->name('rents.index');      
         
         Route::post('admin/likes/store','LikeController@store');      
         Route::post('admin/rents/store','RentController@store');      
         Route::get('admin/rents/create','RentController@create');     
         Route::post('admin/rents/create','RentController@create');     
           
   
    
}); 


Route::get('/home', 'HomeController@index')->name('home');
