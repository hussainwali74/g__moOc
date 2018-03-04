<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Tymon\JWTAuth\Exceptions\JWTException;
USE Tymon\JWTAuth\Facades\JWTAuth;

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
        $user->email = $request->Input('email');
        $user->user_type = "not yet";
        $user->password = bcrypt($request->Input('password'));
        $user->save();
        // $response = array('response'=>'user created', 'success'=> true);
        // return $response;
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
    

}
