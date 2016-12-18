<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Session;
use App\Student;
use App\Subject;
use Auth;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions = Session::all();
        return view('session.index')->with(['sessions' => $sessions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects_for_dropdown = Subject::getSubjectDropdown();

        return view('session.create')->with([
            'subjects_for_dropdown' => $subjects_for_dropdown
        ]);
    }

    /**
     * Store a newly created resource in storage.
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

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
