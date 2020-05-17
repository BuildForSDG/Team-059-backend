<?php

namespace App\Http\Controllers\Api\V1;


class Validation {
   
 /**
  * @param $key :the key to get either rules or equivalent errormessage
  * @description : returns either error messages or rules
  *@return : array of rules/errormessages
  */
public function userValidationData($key)
{

  $validation=  [
    "rules"=>[
        "name"=>"required|min:4",
        "email"=>"required|email|unique:users",
        "password"=>"required|min:4",
        
    ],
    
    "errorMessages"=> [
        "name.required"=>"FullName is required",
        "name.min"=>"Fullname must be Minimum Number 4 Character",
        "email.required"=>"Email is required", 
        "email.email"=>"Please Provide a valid Email",
        "email.unique"=>"Email already exists ,pls log in",
        "password"=>"Password is Required ",
        "password.min"=>"Password must be Minimum Number of 4 in character count",
    ]
    
    ];
    return $validation[$key];
        
}
public function userLoginDataValindation($key)
{
  
  $validation=  [
    "rules"=>[
        "email"=>"required|email",
        "password"=>"required",
        
    ],
    
    "errorMessages"=> [
        "email.required"=>"Email is required", 
        "email.email"=>"Please Provide a valid Email Address",
        "password"=>"Password is Required "  ]
    
    ];
    return $validation[$key];
}



}
