<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/quote',[
    'uses' => 'QuoteController@postQuote',
    'middleware'=>'jwtauth'
]);

Route::get('/quotes',[
    'uses' => 'QuoteController@getQuotes',
    
]);
Route::put('/quote/{id}',[
    'uses'=>'QuoteController@putQuote',
    'middleware'=>'jwtauth'
]);
Route::delete('/quote/{id}',[
    'uses'=>'QuoteController@deleteQuote',
    // 'middleware'=>'jwtauth'
]);




//**           Users              ** */
//********************************* */

//register
Route::post('/register',[
    'uses'=>'UserController@signup'
]);

//login
Route::post('/signin',[
    'uses'=>'UserController@signin'
]);
Route::get('/getUserData',[
    'uses' => 'UserController@getUserData'
]);

//**           Tutor            ** */
//********************************* */

//tutor signup
Route::post('/tutor/signup',[
    'uses'=>'TutorController@setTutor'
]);

//get the user given tutor's id
// get tutor id
Route::get('/tutor/getid',[
    'uses' => 'TutorController@getTutor_id'
]);
Route::get('/tutor/{id}',[
    'uses'=>'TutorController@getUser'
]);
// retrieve courses taught by a tutor given his id
Route::get('/tutor/courses/{id}',[
    'uses' => 'TutorController@getCourses'
]);

//**           Courses            ** */
//********************************* */

// create a course
Route::post('/course/create',[
    'uses' => 'CourseController@createCourse'
]);

// update a course
Route::post('/course/{id}/update',[
    'uses' => 'CourseController@updateCourse'
]);



// get a course by id
Route::get('/course/{id}',[
    'uses' => 'CourseController@getCourse'
]);

// delete a course by id
Route::delete('/course/delete/{id}',[
    'uses' => 'CourseController@deleteCourse'
]);

//get the tutor of a course
Route::get('/course-tutor/{id}',[
    'uses' => 'CourseController@courseTutor'
]);

//***************Course_Deps                  */
//insert course dependencies
Route::post('/course/insertdependencies',[
    'uses' => 'CourseController@createCourseDeps'
]);

//update course dependencies
Route::post('/course/{id}/updatedependencies',[
    'uses' => 'CourseController@updateCourseDeps'
]);

//Get course dependencies
Route::get('/course/dependencies/{id}',[
    'uses' => 'CourseController@getCourseDeps'
]);

//Get submittedAssignments
Route::get('/course/submittedAssignments/{id}',[
    'uses' => 'CourseController@submittedAssignments'
]);


//Enroll a Student in a course
Route::get('/enroll/course/{id}',[
    'uses' => 'CourseController@enrollStudent'
]);



//course student table

Route::post('/course_student',[
    'uses' => 'CourseController@createCourseStudentDep'
]);

Route::get('/course_student/{id}',[
    'uses' => 'CourseController@getCourseStudent'
]);


//**           Comments           ** */
//********************************* */

//create a comment on course
Route::post('/course_comment',[
    'uses' => 'CommentController@createCourseComment'
]);

//create a comment on lecture
Route::post('/lecture_comment',[
    'uses' => 'CommentController@createLectureComment'
]);

Route::get('/course_comment/course/{id}',[
    'uses' => 'CommentController@getCourseComment'
]);
//get user given comment id
Route::get('/course_comment/user/{id}',[
    'uses' => 'CommentController@getCourseCommentUser'
]);


//**           Lectures           ** */
//********************************* */
//create a new lecture
Route::post('/lecture/create',[
    'uses' => 'LectureController@createLecture'
]);

//update a  lecture given its her
Route::post('/lecture/{id}/update',[
    'uses' => 'LectureController@updateLecture'
]);

//get lectures of a course  by course id
Route::get('/lectures/{id}',[
    'uses' => 'LectureController@getLectures'
]);
//student record of viewing a lecture
Route::post('/lecture/{id}',[
    'uses' => 'LectureController@joinlectureStudent'
]);
//student record of viewing a lecture
Route::get('/lecture/{id}/students',[
    'uses' => 'LectureController@lectureStudents'
]);





//**           Assignments           ** */
//********************************* */

//create assignment
Route::post('/course/createassignment',[
    'uses' => 'AssignmentController@createAssignment'
]);

//get assignment
Route::get('/course/assignment/{id}',[
    'uses' => 'AssignmentController@getAssignment'
]);

//


//**           Quizzes            ** */
//********************************* */
//create quizz
Route::post('/course/createquiz',[
    'uses' => 'QuizController@createQuiz'
]);

//get quizz
Route::get('/quiz/{id}',[
    'uses' => 'QuizController@getQuiz'
]);




//get students who took this quiz 
Route::get('/quiz/{id}/students',[
    'uses' => 'QuizController@quizStudents'
]);

            
//**           Students           ** */
//********************************* */

//student takes a quizz
Route::post('/student/{id}/quiz',[
    'uses' => 'StudentController@takeQuiz'
]);

//get score of student in a quiz id
Route::post('/student/quiz/{id}',[
    'uses' => 'StudentController@quizScore'
]);

//student submits assignment
Route::post('/student/submission',[
    'uses' => 'StudentController@submitAssignment'
]);

//set the score of assignment
