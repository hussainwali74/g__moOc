<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tutor;
use App\User;

use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class TutorController extends Controller
{
    public function setTutor(Request $request){

        // registering a user as a tutor

        $user_id = JWTAuth::parseToken()->toUser()->id;
 
        $tutor = new Tutor;
        $tutor->user_id = $user_id;
        $tutor->about = $request->Input('about');
        $tutor->institution = $request->Input('institution');
        $tutor->save();
        return response()->json(['message'=>"tutor created",'user' => $user_id],200);
    }   
    // get last inserted id 
    public function getTutor_id(Request $request){

        $user_id = JWTAuth::parseToken()->toUser()->id;
        $tutor = User::findOrFail($user_id)->tutor; 
        $tutor_id = $tutor->id;

        return response()->json(['tutor_id',$tutor_id],200);
    }

    public function getUser(Request $request, $id){
        
        try{
            // here we are getting the user details of the tutor
            $user = Tutor::findOrFail($id)->user;
            return response()->json(['user'=>$user],200);
        }
        catch(Illuminate\Database\QueryException $e){
            $error_code = $e->errorInfo[1];
            return response()->json(['error'=>'User is not a Tutor',$error_code]);
        }
        
    }

    //get the courses taught by this tutor
    public function getCourses(Request $request, $id)
    {
        $courses = Tutor::find($id)->courses;
        return response()->json(['courses' => $courses], 200);
    }
}
