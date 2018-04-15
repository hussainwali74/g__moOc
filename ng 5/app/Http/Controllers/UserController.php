<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function signup(Request $request){
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password' => 'required'
        ]);

        $user = new User;
        $user->name = $request->Input('name');
        $user->username = $request->Input('username');
        $user->email = $request->Input('email'); 
        $user->photo = "./profile.png";
        $user->password = bcrypt($request->Input('password'));
        $user->save();
        return response()->json(['message'=>"user created"],201);
    }
    
    public function signin(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $credentials = $request->only('email','password');
        try{
            if(!$token = JWTAuth::attempt($credentials)){
                return response()->json(['error'=>'Invalid Credentialsss'],401);
            }
        }catch(JWTException $e){
            return response()->json(['error'=>'token creation error'],500);
        }
        $user = User::where('email',$request->Input('email'))->get();

        return response()->json(['token'=>$token,'user'=>$user],200);
    }
    public function getUserData(Request $request)
    {
        $user = JWTAuth::parseToken()->toUser();
        return response()->json(['user' => $user],200);

    }
    

}
