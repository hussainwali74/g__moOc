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

    public function students(){
        return $this->hasMany('App\Student');
    } 
}
