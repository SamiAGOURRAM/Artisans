<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login;
use App\Http\Requests\Signup;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signup(Signup $request){

        $data = $request->validated();

        /** @var \App\Models\User */

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])

        ]);
        $token = $user->createToken('main')->plainTextToken;

        return response([
            'user' => $user, 
            'token' => $token
        ]);

    }
    public function login(Login $request){

        $credentials = $request->validated();

        $remember = $credentials['remember'] ?? false ;
        unset($credentials['remember']);

        if(!Auth::attempt($credentials, $remember)){
            return response([
                'error' => 'The provided credentials are not correct'
            ], 422);
        }
        $user = Auth::user();
        $token = $user->createToken('main')->plainTextToken;
        return response([
            'user' => $user,
            'token'=>$token
        ]);
        
    }
    public function logout(Request $request){

        $user = Auth::user();
        $user->currentAccessToken()->delete();
        return response([
            'success'=>true
        ]);
    }
    //
}
