<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Course_Deps;
class CourseController extends Controller
{
    // ****** handle NotFoundHttpException Error
    // ****** JWT AUTHHHHHHH
    // ****** if not working


    public function createCourse(Request $request){
        // ****** JWT AUTHHHHHHH
        $this->validate( $request, [
            
            'tutor_id' => 'required',
            'level' => 'required',
            'language' => 'required',
            'price' => 'required',
            'title' => 'required'
        ]);
        
        $course = new Course;
        $course->tutor_id = $request->Input('tutor_id');
        $course->level = $request->Input('level');
        $course->language = $request->Input('language');
        $course->price = $request->Input('price');
        $course->title = $request->Input('title');
        $course->description = $request->Input('description');
        $course->photo = $request->Input('photo');
        
        if($course->save())
        {
            return response()->json(['message' => 'Course Created'], 200);
        }
        else{
            return response()->json(['message' => 'Error creating course'],400);
        }
    }
    public function getCourse(Request $request, $id){
        // ****** handle NotFoundHttpException Error
        // ****** JWT AUTHHHHHHH

        $course = Course::findOrFail($id);
        return response()->json(['Message' => $course],200);
    }
    public function deleteCourse(Request $request, $id){
        // ****** JWT AUTHHHHHHH
        $course = Course::findOrFail($id);
        

        // ****** this if is not working y???
        if(!$course){
            return response()->json(['message' =>'Course not found'], 404);
        }
        
        $course->delete();
        return response()->json(['message'=> 'Course deleted'],201);
    }

    // get the tutor of a course provided course Id
    public function courseTutor(Request $request, $id)
    {
        $tutor = Course::find($id)->tutor;
        return response()->json(['tutor' => $tutor], 200);
    }

    //** insert data into Course Tutor Dependencies **/
    public function createCourseDeps(Request $request)
    {
        $course_deps =  new Course_Deps;
        $course_deps->course_id = $request->Input('course_id'); 
        $course_deps->no_of_lectures = $request->Input('no_of_lectures');
        $course_deps->duration = $request->Input('duration');
        $course_deps->category = $request->Input('category');
        $course_deps->subcategory = $request->Input('subcategory');
        $course_deps -> save();
        return response()->json(['message' => 'Dependencies created'],200);
    }

    //** Get Course dependencies given its id **/
    public function getCourseDeps(Request $request, $id)
    {
        $course_deps = Course_Deps::find($id);
        return response()->json(['Course Deps: ' => $course_deps],200);
        
    }
}
