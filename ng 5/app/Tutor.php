<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Student;

class Tutor extends Model
{
    protected $table = 'tutors'; 

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function students()
    {
        return $this->hasMany('App\Student');
    } 

    public function courses()
    {
        return $this->hasMany('App\Course');
    }

    public function quizzes()
    {
        return $this->hasMany('App\Quiz','tutor_id');
    }

}
