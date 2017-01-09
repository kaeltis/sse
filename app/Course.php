<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function members()
    {
        return $this->belongsToMany('App\User')->withPivot('grade');
    }
}
