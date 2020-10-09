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


Auth::routes();


Route::get('/', function () {return view('welcome');})->name('welcome');


//Route::post('session', 'Backend\ClientController@session')->name('session');

//Middleware Clients

Route::get('clients/loginClient', 'Backend\ClientController@showLogin')->name('clientlogin'); 

Route::post('clients/loginClient', 'Backend\ClientController@loginClient')->name('loginClient');      

Route::get('clients/logout','Backend\ClientController@logoutClient')->name('logoutClient');
  
     
     //Middleware Jobbers

Route::get('jobbers/loginJobber', 'Backend\JobberController@showLogin')->name('jobberlogin'); 

Route::post('jobbers/loginJobber', 'Backend\JobberController@loginJobber')->name('loginJobber');    

Route::get('jobbers/logout','Backend\JobberController@logoutJobber')->name('logoutJobber');
  

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
         Route::get('approve/{id}','RentController@Approve')->name('approve');         
         Route::get('notapprove/{id}','RentController@NotApprove')->name('notapprove');         
        
                 
   
        Route::get('rents/create/{id}','RentController@create')->name('rents.create');         
   
    
}); 

Route::group(['prefix' => 'user', 'middleware'=> 'auth', 'namespace' => 'Forntend'], function () {
   
Route::get('/home', 'HomeController@index')->name('home');
Route::get('locations', 'HomeController@Locations')->name('locations');
Route::get('location/{id}', 'HomeController@ShowLocation')->name('location');
Route::get('Rent/{id}', 'HomeController@RentLocation')->name('rent');
Route::get('Rents/{id}', 'HomeController@RentClient')->name('rentclient');



 
});