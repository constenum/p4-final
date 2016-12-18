<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Show the tutor's open tutoring sessions.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if($user) {
            $sessions = $user->sessions()->orderBy('id', 'ASC')->get();
        }
        else {
            $sessions = [];
        }
        return view('home')->with([
            'sessions' => $sessions
        ]);
    }
}
