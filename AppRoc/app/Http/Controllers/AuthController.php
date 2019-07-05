<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\loginRequest;
use App\Http\Requests\Auth\registerRequest;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class AuthController extends Controller
{
    public function login(loginRequest $request)
    {
         if (!auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
         ])){
            return response()->json(['message'=> 'Not authorized'], 401);
         }
    		
        $user = auth()->user();

        $accessToken = $user->createToken( $user->name )->accessToken;
        return response(['user' => auth()->user(), 'access_token' => $accessToken]);
	}


    public function logout()
    {
        auth()->user()->tokens->each( function ($token, $key)
        {
            $token->delete();
        });

        return response()->json('Logged Out', 200);
    }



    public function register(registerRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json($user);
    }
}

