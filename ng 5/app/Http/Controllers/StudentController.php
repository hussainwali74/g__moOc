<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;
use App\Quiz;
use App\SubmitAssignment;

class StudentController extends Controller
{
    public function takeQuiz(Request $request,$id)
    {
        $student = Student::find($id);
         
        $quiz_id = $request->Input('quiz_id');
        $score = $request->Input('score');  

        $student->quizzes()->attach($quiz_id,['score' => $score]);
        
        return response()->json(['message' => "enjoy the quiz"],200);

    }

    //by a quiz id get the marks in that quiz
    public function quizScore(Request $request, $id){

        $quiz_id = $request->Input('quiz_id');
        
        $quizes = Student::find($id)->quizzes;

        $scores =[];
        foreach($quizes as $q){
            $scores[] = $q->pivot->score;
        } 
        return response()->json(['message' => $scores],200);
    }

    //submit assignment
    public function submitAssignment(Request $request)
    {
        $assignment = new SubmitAssignment;

        $assignment->assignment_id = $request->Input('assignment_id');
        $assignment->student_id = $request->Input('student_id');
        $assignment->file = $request->Input('file');

        $assignment->save();
        
        return response()->json(['message' => 'assignment submitted'],200);


    }
}
