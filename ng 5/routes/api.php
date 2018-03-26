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
Route::get('/tutor/{id}',[
    'uses'=>'TutorController@getUser'
]);

// create a course
Route::post('/tutor/course/create',[
    'uses' => 'CourseController@createCourse'
]);
// retrieve a course by id
Route::get('/tutor/course/{id}',[
    'uses' => 'CourseController@getCourse'
]);
// delete a course by id
Route::delete('/tutor/course/delete/{id}',[
    'uses' => 'CourseController@deleteCourse'
]);
//get the tutor of a course
Route::get('/course/{id}',[
    'uses' => 'CourseController@courseTutor'
]);