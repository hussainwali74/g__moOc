<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Course;
use App\User;
use App\Student;
use App\Tutor;
use App\Course_Deps;
use App\Course_Student_Dep;
use App\Assignment;
use App\SubmitAssignment;


use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
class CourseController extends Controller
{
    // ****** handle NotFoundHttpException Error
    // ****** JWT AUTHHHHHHH
    // ****** if not working


    public function createCourse(Request $request){
        // ****** JWT AUTHHHHHHH
        $this->validate( $request, [
            
            // 'tutor_id' => 'required',
            // 'level' => 'required',
            // 'language' => 'required',
            // 'price' => 'required',
            'title' => 'required'
        ]);

        $user_id = JWTAuth::parseToken()->toUser()->id;
        $tutor = User::findOrFail($user_id)->tutor; 
        $tutor_id = $tutor->id;
        
        $course = new Course;
        $course->tutor_id = $tutor_id;
        $course->level = $request->Input('level');
        $course->language = $request->Input('language');
        $course->price = $request->Input('price');
        $course->title = $request->Input('title');
        $course->description = $request->Input('description');
        $course->photo = $request->Input('photo');
        
        if($course->save())
        {
            $course_id = DB::getPdo()->lastInsertId(); //get last inserted course_id
            return response()->json(['message' => 'Course Created',"course_id" => $course_id], 200);
        }
        else{
            return response()->json(['message' => 'Error creating course'],400);
        }
    }
    
    // update a course
        public function updateCourse(Request $request,$id){
            // ****** JWT AUTHHHHHHH
            $course = Course::find($id);
            
            if($request->Input('price') != NULL){
                $course->price = $request->Input('price');
            }
            if($request->Input('level') != NULL){
                $course->level = $request->Input('level');
            }
            if($request->Input('description') != NULL){
                $course->description = $request->Input('description');
            }
            if($request->Input('language') != NULL){
                $course->language = $request->Input('language');
            }
            // $course->photo = $request->Input('photo');
            
            if($course->save())
            {
                return response()->json(['message' => 'Course updated'], 200);
            }
            else{
                return response()->json(['message' => 'Error creating course'],400);
            }
        }
    

    //find a course by id
    public function getCourse(Request $request, $id){
        // ****** handle NotFoundHttpException Error
        // ****** JWT AUTHHHHHHH

        $course = Course::findOrFail($id);
        $course_deps = Course::findOrFail($id)->course_deps;
        $tutor = Course::findOrFail($id)->tutor;
        $user = $tutor->user;
        $course['tutor'] = $user['name'];
        $course['pre_requisites'] = $course_deps['pre_requisites'];
        $course['audience'] = $course_deps['audience'];
        $course['expectations'] = $course_deps['expectations'];
        $course['message'] = $course_deps['message'];
        $course['category'] = $course_deps['category'];
        $course['subcategory'] = $course_deps['subcategory'];
        return response()->json(['course' => $course],200);
    }

    //deleting a course by id
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

//********************* course deps *******/
//////////////////////////////////////////

    //** insert data into Course Tutor Dependencies **/
    public function createCourseDeps(Request $request)
    {
        $course_deps =  new Course_Deps;
        $course_deps->course_id = $request->Input('course_id'); 
        $course_deps->no_of_lectures = $request->Input('no_of_lectures');
        $course_deps->pre_requisites = $request->Input('pre_requisites');
        $course_deps->audience = $request->Input('audience');
        $course_deps->expectations = $request->Input('expectations');
        $course_deps->summary = $request->Input('summary');
        $course_deps->duration = $request->Input('duration');
        $course_deps->category = $request->Input('category');
        $course_deps->subcategory = $request->Input('subcategory');
        $course_deps -> save();
        return response()->json(['message' => 'Dependencies created'],200);
    }

    //** update data into Course Tutor Dependencies **/
    public function updateCourseDeps(Request $request,$id)
    {
        $course_deps = Course::find($id)->course_deps;


        if($request->Input('summary') != NULL){
            $course_deps->summary = $request->Input('summary');
        }
        if($request->Input('category') != NULL){
            $course_deps->category = $request->Input('category');
        }
        if($request->Input('subcategory') != NULL){
            $course_deps->subcategory = $request->Input('subcategory');
        }
        if($request->Input('message') != NULL){
            $course_deps->message = $request->Input('message');
        }
        $course_deps -> save();
        return response()->json(['message' => 'Dependencies updated'],200);
    }

    //** Get Course dependencies given its id **/
    public function getCourseDeps(Request $request, $id)
    {
        $course_deps = Course_Deps::find($id);
        return response()->json(['Course Deps: ' => $course_deps],200);
        
    }
    
    //** -- Course Student dependencies  **/
    //** insert data student interaction course dependencies  **/
    public function createCourseStudentDep(Request $request)
    {
        $course_student_deps = new Course_Student_Dep;

        $course_student_deps->course_id = $request->Input('course_id');
        $course_student_deps->student_id = $request->Input('student_id');
        $course_student_deps->rating = $request->Input('rating');
        $course_student_deps->comment_id = $request->Input('comment_id');//remove it
        $course_student_deps->student_progress = $request->Input('student_progress');
        $course_student_deps->active = $request->Input('active');
        
        $course_student_deps->save();

        return response()->json(['Course Student Deps: ' => "course_student_dep created"],200);

    }

    //Enrolling a student: many  to many relation b/w course and student
    public function enrollStudent(Request $request,$id)
    {
        $course = Course::find($id);
        
        $student_id  = $request->Input('student_id');
        $course->students()->attach($student_id);

        return response()->json(['message: ' => "student enrolled" ],200);
    }
    
    //get submitted assignments in this course
    public function submittedAssignments($id)
    {
        $assignments = Assignment::where('course_id',$id)->get();
        $submittedassignments = [];
        foreach($assignments as $assignment){
            $idd = $assignment->id;
            $submittedassignments[] = SubmitAssignment::where('assignment_id', $idd)->get(); 

        }
        // $submittedAssignments = SubmitAssignment::where('');
        return response()->json(['message' => $submittedassignments ],200);
    }
}
