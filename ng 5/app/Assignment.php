<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    //course to which this assignment belongs to
    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    //students taking this  assignment 
    public function students()
    {
        return $this->belongsToMany('App\Student','assignment_student','assignment_id','student_id');
    }
    
    //submitted assignments
    public function submitted_assignments()
    {
        return $this->hasMany('App\SubmitAssignment','submitted_assignments','assignment_id');
    }


}
