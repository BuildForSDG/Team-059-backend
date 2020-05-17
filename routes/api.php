<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| api Routes
|--------------------------------------------------------------------------
|
| Here is where you can register api routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your api!
|
*/
######################## VERSION 1 ##############################

 
//User/Teacher routing group
Route::prefix('v1/user')->middleware([])->group(function(){

    Route::get('/',function(){
        return response()->json(['details'=>'User endpoint']);
    });

    Route::post('/create','api\v1\Users\UserController@create');
    Route::post('/login','api\v1\Users\UserController@login');
    Route::post('/logout','api\v1\Users\UserController@logout');


    //protect user endpoints
     Route::middleware([/*'auth:api'*/])->group(
function(){
   


}

     );
    
    });


 
//Company/Schools routing group
Route::prefix('v1/company')->middleware([/*'auth:api'*/])->group(function(){

    Route::get('/',function(){
    
        return response()->json(['details'=>'Company endpoint']);
    
    });


    //protect company endpoints
     Route::middleware([])->group(
function(){
   


}

     );
    
    });
    
 

    
//Admin routing group
Route::prefix('v1/admin')->middleware([/*'auth:api'*/])->group(function(){

    Route::get('/',function(){
    
        return response()->json(['details'=>'Admin endpoint']);
    
    });


    //protect admin endpoints
     Route::middleware([])->group(
function(){
   


}

     );
    
    });


######################## VERSION 1 ROUTING ENDS ##############################
