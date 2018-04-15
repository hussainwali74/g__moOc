<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz;
use App\Course;

class QuizController extends Controller
{
    //create quiz
    public function createQuiz(Request $request)
    {
        $quiz = new Quiz;

        $course_id = $request->Input('course_id');
        $tutor = Course::find($course_id)->tutor;
        $quiz->course_id = $course_id;
        $quiz->tutor_id = $tutor->id;
        $quiz->title = $request->Input('title');
        $quiz->due_date = $request->Input('due_date');
        $quiz->time_allowed = $request->Input('time_allowed');

        $quiz->save();

        return response()->json(['message:' => "quiz created "],200);

    }

    //get details of quiz of given id
    public function getQuiz($id)
    {
        $quiz = Quiz::find($id);

        return response()->json(['quiz: ' => $quiz],200);
    }

    //create details student taking quiz
    public function FunctionName(Type $var = null)
    {
        # code...
    }
    //get students who took this quiz 
    public function quizStudents($id)
    {
        $students = Quiz::find($id)->students;

        return response()->json(['students' => $students]);
    }

}
