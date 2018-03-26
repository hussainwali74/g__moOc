<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course_Deps extends Model
{   
    protected $table = "course_deps";
    protected $primaryKey = 'course_id'; // or null

    public $incrementing = false;
    public function course()
    {
        return $this->belongsTo('App\Course');
    }
} 
