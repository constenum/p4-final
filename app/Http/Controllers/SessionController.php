<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Session;
use App\Student;
use App\Subject;
use App\User;
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
        $tutors_for_dropdown = User::getTutorDropdown();

        return view('session.create')->with([
            'subjects_for_dropdown' => $subjects_for_dropdown,
            'tutors_for_dropdown' => $tutors_for_dropdown
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
            'student_number' => 'required|exists:students,student_number',
        ]);

        # Form Data
        $student_id = Student::where('student_number', '=', $request->input('student_number'))->first();
        $subject_id = $request->input('subject_id');
        $tutor_id = $request->input('tutor_id');

        # Insert New Session Record
        $session = new Session();
        $session->subject_id = $request->input('subject_id');
        $session->student_id = $student_id->id;
        $session->user_id = $request->input('tutor_id');
        $session->session_ended = true;
        $session->save();

        \Session::flash('flash_message', 'The tutoring session has been created successfully!');

        return redirect('/sessions');
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
        $session = Session::find($id);

        $subjects_for_dropdown = Subject::getSubjectDropdown();
        $tutors_for_dropdown = User::getTutorDropdown();

        return view('session.edit')->with([
            'session' => $session,
            'subjects_for_dropdown' => $subjects_for_dropdown,
            'tutors_for_dropdown' => $tutors_for_dropdown
        ]);
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
        # Validate
        $this->validate($request, [
            'student_number' => 'required|exists:students,student_number',
        ]);

        # Form Data
        $student_id = Student::where('student_number', '=', $request->input('student_number'))->first();
        $subject_id = $request->input('subject_id');
        $tutor_id = $request->input('tutor_id');

        # Insert New Session Record
        $session = Session::find($request->id);
        $session->subject_id = $request->input('subject_id');
        $session->student_id = $student_id->id;
        $session->user_id = $request->input('tutor_id');
        $session->save();

        \Session::flash('flash_message', 'The tutoring session has been updated successfully!');

        return redirect('/sessions');
    }

    /**
    * Page to confirm deletion
	*/
    public function delete($id) {

        $session = Session::find($id);

        $subjects_for_dropdown = Subject::getSubjectDropdown();
        $tutors_for_dropdown = User::getTutorDropdown();

        return view('session.delete')->with([
            'session' => $session,
            'subjects_for_dropdown' => $subjects_for_dropdown,
            'tutors_for_dropdown' => $tutors_for_dropdown
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $session = Session::find($id);
        $session->delete();

        \Session::flash('flash_message', 'The tutoring session has been deleted successfully!');

        return redirect('/sessions');
    }
}
