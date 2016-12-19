<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    /* Relationship Method */

    /**
    * Each user has many sessions
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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
	* Create dropdown to show tutors.
	*/
    public static function getTutorDropdown() {

        $tutors = User::orderBy('name', 'ASC')->get();

        $tutors_for_dropdown = [];
        foreach($tutors as $tutor) {
            $tutors_for_dropdown[$tutor->id] = $tutor->name;
        }

        return $tutors_for_dropdown;
    }
}
