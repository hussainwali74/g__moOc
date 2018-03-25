<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tutor;

use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class TutorController extends Controller
{
    public function setTutor(Request $request){
        $this->validate($request,[
            'user_id'=>'required',
            'about'=>'required',
            'city'=>'required',
            'institution'=>'required'
        ]);
        $tutor = new Tutor;
        $tutor->user_id = $request->Input('user_id');
        $tutor->about = $request->Input('about');
        $tutor->city = $request->Input('city');
        $tutor->institution = $request->Input('institution');
        $tutor->save();
        return response()->json(['message'=>"tutor created"]);
    }    
    public function getUser(){
 
        $user = Tutor::find(1)->user;
        return response()->json(['user'=>$user],200);
    }
}
