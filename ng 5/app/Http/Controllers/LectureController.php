<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Lecture;
use App\Student;

class LectureController extends Controller
{
    public function createLecture(Request $request)
    {
        $lecture = new Lecture;

        $lecture->course_id = $request->Input('course_id');
        $lecture->name = $request->Input('name');
        $lecture->description = $request->Input('description');
        $lecture->video = $request->Input('video');
        $lecture->pdf = $request->Input('pdf');
        
        $lecture->save();
        
        return response()->json(['message' => "lecture created" ], 200);        
    }

    //get a lectures of a course by course id
    public function getLectures(Request $request, $id)
    {
        // $course = Course::find($id);
        $lectures = Lecture::where('course_id', $id)->get();

        // $lecture = Lecture::find($id)->course->tutor->user; //you can find anythingg
        
        return response()->json(['lectures' => $lectures ], 200);        
    }
 
    //update a lectures given id
    public function updateLecture(Request $request, $id)
    {
        // $course = Course::find($id);
        $lecture = Lecture::find($id);
        
        $lecture->name = $request->Input('name');
        $lecture->description = $request->Input('description');
        $lecture->video = $request->Input('video');
        $lecture->pdf = $request->Input('pdf');
        $lecture->save();
        return response()->json(['lectures' => $lecture ], 200);        
    }


    /***     Lecture   Student   *** */
    //student joins lecture by lecture id
    public function joinlectureStudent(Request $request, $id)
    {  
        $lecture = Lecture::find($id);
        $student_id = $request->Input('student_id');
        $lecture->students()->attach($student_id); 

        return response()->json(['message: ' => "student enrolled" ],200);
        
    }
    //return all students viewing the lecture of id given
    public function lectureStudents($id)
    { 
        $student = Lecture::find($id)->students;
        
        return response()->json(['message: ' => $student ],200);

    }
    
}
