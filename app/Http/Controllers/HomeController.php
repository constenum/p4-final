<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Session;
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
            $sessions = $user->sessions()->whereNull('session_ended')->orderBy('id', 'ASC')->get();
        }
        else {
            $sessions = [];
        }
        return view('home')->with([
            'sessions' => $sessions
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $session = Session::find($id);
        $session->session_ended = true;
        $session->save();

        \Session::flash('flash_message', 'The tutoring session has been ended successfully!');

        return redirect('/');
    }
}
