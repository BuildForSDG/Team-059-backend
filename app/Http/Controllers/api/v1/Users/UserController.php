<?php

namespace App\Http\Controllers\api\v1\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User as User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\api\v1\Validation;

class UserController extends Controller
{
    
   
    public function create(Request $request)
    {

/*name
username
email
password*/


$validation = new Validation();
$validator = Validator::make($request->all(),
$validation->userValidationData("rules"),
$validation->userValidationData("errorMessages"));
if($validator->fails()){

    return response()->json(["result"=>0,
    "error"=>$validator->errors(),
      "data" => []]
    ,200);
}

 User::create($request->all(),['password'=> Hash::make($request->password)])->save();
        return response()->json(["result"=>1,
      "data" => ["report"=>"User Registered Successfully"]
    ],201);
    }
 

    public function login(Request $request)
    {

      
$validation = new Validation();
$validator = Validator::make($request->all(),
$validation->userLoginDataValindation("rules"),
$validation->userLoginDataValindation("errorMessages"));
if($validator->fails()){

    return response()->json(["result"=>0,
    "error"=>$validator->errors(),
      "data" => []]
    ,200);
}

      $credentials = $request->only(['email', 'password']);

      if (!$token = auth()->attempt($credentials)) {
        return response()->json(['result'=>0,'error' => 'Unauthorized'], 401);
      }

      return response()->json(['result'=>1,'data' => ['token'=>$token,'user_id'=>Auth::user()->id]], 200);


    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['result'=>1,'data'=>['message' => 'Successfully logged out']],200);
    }

}
