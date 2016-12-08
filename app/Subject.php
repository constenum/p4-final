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
}
