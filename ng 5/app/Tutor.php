<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    public function user(){
        return $this->belongsTo('User');
    }
}
