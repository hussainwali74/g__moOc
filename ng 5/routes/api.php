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

Route::post('/register',[
    'uses'=>'UserController@signup'
]);
Route::post('/signin',[
    'uses'=>'UserController@signin'
]);
Route::post('/tutor/signup',[
    'uses'=>'TutorController@setTutor'
]);
//get the user given tutor's id
Route::get('/tutor/{id}',[
    'uses'=>'TutorController@getUser'
]);
// retrieve courses taught by a tutor given his id
Route::get('/tutor/courses/{id}',[
    'uses' => 'TutorController@getCourses'
]);


// create a course
Route::post('/course/create',[
    'uses' => 'CourseController@createCourse'
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
//insert course dependencies
Route::post('/course/insertdependencies',[
    'uses' => 'CourseController@createCourseDeps'
]);
//Get course dependencies
Route::get('/course/dependencies/{id}',[
    'uses' => 'CourseController@getCourseDeps'
]);