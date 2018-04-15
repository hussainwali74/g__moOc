<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assignment;
class AssignmentController extends Controller
{ 

    // create an assignment
    public function createAssignment(Request $request)
    {
        $assignment = new Assignment;
        
        $assignment->course_id = $request->Input('course_id');
        $assignment->title = $request->Input('title');
        $assignment->description = $request->Input('description');
        $assignment->file = $request->Input('file');
        $assignment->deadline = $request->Input('deadline');

        $assignment->save();

        return response()->json(['message' => 'assignment created'], 200);
    }
    
    //get assignment
    public function getAssignment(Request $request, $id)
    {
        $assignment = Assignment::find($id);

        return response()->json(['message' => $assignment], 200);
        
    }
    

}
