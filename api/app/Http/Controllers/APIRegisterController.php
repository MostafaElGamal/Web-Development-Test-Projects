<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;

use App\User;
use JWTFactory;
use JWTAuth;
use Validator;
use Response;

use Illuminate\Http\Request;

class APIRegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
    	if(!$request){
        return response()->json($reqauest->errors());
      }

      User::create([
        'name'=>$reqauest->name,
        'email'=> $reqauest->email,
        'password'=>$reqauest->Hash::make($data['password'])
      ]);

      $user = User::first();
      $token = JWTAutH::fromUser($user);
      return response()->json( compact('token'));
    }
}
