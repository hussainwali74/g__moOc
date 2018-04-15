<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment_Lecture extends Model
{   
    protected $table = "comment_lecture";
    //comment belongs to a comment
    public function comments()
    {
        return $this->belongsTo('App\Lecture');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
