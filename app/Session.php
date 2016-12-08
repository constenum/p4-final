<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    /* Relationship Methods */

    /**
    * Each seseion has one subject
    */
    public function subject() {
        return $this->belongsToMany('App\Subject');
    }

    /**
    * Each seseion has one student
    */
    public function student() {
        return $this->belongsToMany('App\Student');
    }

    /**
    * Each seseion has one user
    */
    public function user() {
        return $this->belongsToMany('App\User');
    }

    /* End Relationship Method */


}
