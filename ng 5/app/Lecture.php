<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    //lecture comments
    public function comments()
    {
        return $this->hasMany('App\Comment_Lecture');
    }
    
    //lecture students
    public function students(){
        return $this->belongsToMany('App\Student','lecture_student','lecture_id','student_id');
    }

    //lecture course
    public function course()
    {
        return $this->belongsTo('App\Course');
    }

}
