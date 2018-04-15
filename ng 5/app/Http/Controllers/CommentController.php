<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Course;
use App\User;
use App\Comment_Course;
use App\Comment_Lecture;


class CommentController extends Controller
{

    public function createCourseComment(Request $request)
    {
     
        $comment = new Comment_Course;

        $comment->course_id = $request->Input('course_id');
        $comment->user_id = $request->Input('user_id');
        $comment->comment = $request->Input('comment');
        
        $comment->save();
        return response()->json(['message' => "comment created"],200);
        
    }
    public function getCourseComment(Request $request,$id)
    {
        $comment = Comment_Course::find($id);

        return response()->json(['message' => $comment],200);   
    }

    //get user given comment id
    public function getCourseCommentUser(Request $request, $id)
    {
        $user = Comment_Course::find($id)->user;
        
        return response()->json(['user' => $user],200);   
    }
    
    
    //************** Lecture Comments ******************* */
    public function createLectureComment(Request $request)
    {
        
        $comment = new Comment_Lecture;
        
        $comment->lecture_id = $request->Input('lecture_id');
        $comment->user_id = $request->Input('user_id');
        $comment->comment = $request->Input('comment'); 
        
        $comment->save();

        return response()->json(['message' => "Comment On Lecture Created"],200);   
    }
}
