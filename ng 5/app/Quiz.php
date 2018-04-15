<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    
    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function students()
    {
        return $this->belongsToMany('App\Student','quiz_student','quiz_id')-withPivot('score')->withTimestamps();
    }
    
    public function tutor()
    {
        return $this->belongsTo('App\Tutor');
    }
}
