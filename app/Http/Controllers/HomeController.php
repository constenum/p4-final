<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Session;
use App\Subject;
use App\Student;
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
     * Show the form for creating a new tutoring session.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects_for_dropdown = Subject::getSubjectDropdown();

        return view('create')->with([
            'subjects_for_dropdown' => $subjects_for_dropdown
        ]);
    }

    /**
     * Store a newly created tutoring session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        # Validate
        $this->validate($request, [
            'student_number' => 'required_without:card_number|exists:students,student_number',
            'card_number' => 'required_without:student_number|exists:students,card_number',
        ]);

        # Form Data
        $student_number = $request->input('student_number', 0);
        $card_number = $request->input('card)number', 0);
        $tutor_id = Auth::id();
        $subject_id = $request->input('subject_id');

        if ($student_number != 0) {
            $student_id = Student::where('student_number', '=', $student_number)->first();
        }
        else {
            $student_id = Student::where('card_number', '=', $card_number)->first();
        }

        # Insert New Session Record
        $session = new Session();
        $session->subject_id = $request->input('subject_id');
        $session->student_id = $student_id->id;
        $session->user_id = Auth::id();
        $session->save();

        \Session::flash('flash_message', 'The tutoring session has been created successfully!');

        return redirect('/');
    }

    /**
     * Update the specified tutoring session - change status from open to ended.
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
