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
        return $this->hasMany('App\Course');
    }
    // this will give student personal details
    public function user(){
        return $this->belongsTo('User');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
 
}
