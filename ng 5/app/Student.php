<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
 
    //  this will give all the courses the student is taking
    public function courses()
    {
        return $this->belongsToMany('App\Course','course_student','student_id','course_id')->withTimestamps();
    }

    
    // this will give student personal details
    public function user(){
        return $this->belongsTo('App\User');
    }

    
    public function lectures()
    {
        return $this->belongsToMany('App\Lecture','lecture_student','student_id','lecture_id')->withTimestamps();
    }

    //student's quizzes
    public function quizzes()
    {
        return $this->belongsToMany('App\Quiz','quiz_student','student_id', 'quiz_id')->withPivot('score')->withTimestamps();
    }

    //student's submitted assignments
    public function assignment()
    {
        return $this->hasMany('App\SubmitAssignment','submitted_assignments','student_id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
 
}
