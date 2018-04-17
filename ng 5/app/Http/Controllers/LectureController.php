<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Lecture;
use App\Student;
use Illuminate\Support\Facades\Storage;

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
    public function addContent(Request $request)
    {
        // $this->validate($request,[
        //     'image' => 'image | file |  nullable | max:1999'
        // ]);

        // $uniqueFileName = uniqid() . $request->get('upload_file')->getClientOriginalName() . '.' . $request->get('upload_file')->getClientOriginalExtension());

        // $request->get('upload_file')->move(public_path('files') . $uniqueFileName);

        // return redirect()->back()->with('success', 'File uploaded successfully.');

        $disk = Storage::disk('local');

        //************************************ */
        // php.ini files contains some limits that might affect this. Try changing these to high enough values:

        // upload_max_filesize = 10M
        // post_max_size = 10M
        // memory_limit = 32M
        //handle file upload
        //*********************************************** */
        $Sizes = array();
        $Sizes[] = ini_get('upload_max_filesize');
        // $Sizes[] = ini_get('post_max_size');
        // $Sizes[] = ini_get('memory_limit');
        // for($x=0;$x<count($Sizes);$x++){
        //     $Last = strtolower($Sizes[$x][strlen($Sizes[$x])-1]);
        //     if($Last == 'k'){
        //         $Sizes[$x] *= 1024;
        //     } elseif($Last == 'm'){
        //         $Sizes[$x] *= 1024;
        //         $Sizes[$x] *= 1024;
        //     } elseif($Last == 'g'){
        //         $Sizes[$x] *= 1024;
        //         $Sizes[$x] *= 1024;
        //         $Sizes[$x] *= 1024;
        //     } elseif($Last == 't'){
        //         $Sizes[$x] *= 1024;
        //         $Sizes[$x] *= 1024;
        //         $Sizes[$x] *= 1024;
        //         $Sizes[$x] *= 1024;
        //     }
        // }
        if($request->hasFile('image')){
            $fileNameWithExt = $request->file('image')->getClientOriginalName();

            // get just file name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // GET EXTENSION
            $extension = $request->file('image')->getClientOriginalExtension();
            // file name to store
            $fileNameToStore = $filename.' '.time().'.'.$extension;
            // upload image
            $path = $request->file('image')->storeAs('/public/images/',$fileNameToStore);
            // $disk->put($fileNameToStore, fopen($filename, 'r+'));
        }else{
            $fileNameToStore = 'noImage.jpg';
            $path = "nothing";
        }
        return response()->json(['message' => $path, 'sizes' => $Sizes ], 200);        
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
