<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tutor;

use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class TutorController extends Controller
{
    public function setTutor(Request $request){

        // registering a user as a tutor
        
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
        return response()->json(['message'=>"tutor created"],200);
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
