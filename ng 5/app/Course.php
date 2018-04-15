<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Course extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
 
    //  this will give all the students enrolled in the course
    public function students()
    {
        return $this->belongsToMany('App\Student','course_student','course_id','student_id')->withTimestamps();;
    }


    // this will give the tutor teaching the course
    public function tutor()
    {
        return $this->belongsTo('App\Tutor');
    }

    //this will give all the lectures in the course
    public function lectures()
    {
        return $this->hasMany('App\Lecture');
    }

    //course dependencies
    public function course_deps()
    {   
        return $this->hasOne('App\Course_Deps','course_id');
    }

    //comments on this course
    public function comments()
    {
        return $this->hasMany('App\Comment_Course','course_id');
    }

    
    //Assignments of this course
    public function assignments()
    {
        return $this->hasMany('App\Assignment','course_id');
    }


    //Quizzes in this course
    public function quizzes()
    {
        return $this->hasMany('App\Quiz','course_id');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
 
}
