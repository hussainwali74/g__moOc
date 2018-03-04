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
 
    //  this will give all the students taking the course
    public function students()
    {
        return $this->hasMany('App\Student');
    }


    // this will give the tutor teaching the course
    public function tutor()
    {
        return $this->belongsTo('App\Tutor');
    }

    //this will give all the lectures in the course
    public function lectures()
    {
        return $this->hasMany('Lectures');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
 
}
