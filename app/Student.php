<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /* Relationship Method */

    /**
    * Each student has many sessions
    */
    public function sessions() {
        return $this->hasMany('App\Session');
    }

    /* End Relationship Method */


    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_number', 'first_name', 'last_name', 'card_number',
    ];
}
