<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Session extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /* Relationship Methods */

    /**
    * Each seseion has one subject
    */
    public function subject() {
        return $this->belongsTo('App\Subject');
    }

    /**
    * Each seseion has one student
    */
    public function student() {
        return $this->belongsTo('App\Student');
    }

    /**
    * Each seseion has one user
    */
    public function user() {
        return $this->belongsTo('App\User');
    }

    /* End Relationship Method */

    use SoftDeletes;
}
