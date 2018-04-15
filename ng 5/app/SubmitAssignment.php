<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubmitAssignment extends Model
{
    protected $table = 'submitted_assignments';

    public function assignment()
    {
        return $this->belongsTo('App\Assignment');
    }

    public function student()
    {
        return $this->belongsTo('App\Student');
    }
}
