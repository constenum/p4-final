<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    /* Relationship Method */

    /**
    * Each subject has many sessions
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
        'subject',
    ];

    /**
	* Create dropdown to show subjects.
	*/
    public static function getSubjectDropdown() {

        $subjects = Subject::orderBy('subject', 'ASC')->get();

        $subjects_for_dropdown = [];
        foreach($subjects as $subject) {
            $subjects_for_dropdown[$subject->id] = $subject->subject;
        }

        return $subjects_for_dropdown;
    }
}
