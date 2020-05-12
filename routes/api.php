<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

 
//User routing group
Route::prefix('v1/user')->middleware([/*'auth:api'*/])->group(function(){

    Route::get('/',function(){
        return response()->json(['details'=>'User endpoint']);
    });

    Route::post('/create','api\v1\UserController@register');
    Route::post('/login','api\v1\UserController@authenticate');


    //protect user endpoints
     Route::middleware(['jwt.verify'])->group(
function(){
   


}

     );
    
    });

