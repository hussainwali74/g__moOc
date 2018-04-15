<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment_Course extends Model
{
    protected $table = "comment_course";

    //get the course on which this comment was posterd
    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    //get the user who posted this comment
    public function user()
    {
        return $this->belongsTo('App\User');
    }



}
