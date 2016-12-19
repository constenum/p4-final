@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Tutoring Session</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/sessions/{{ $session->id }}">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}

                        <input name='session_id' value='{{$session->id}}' type='hidden'>

                        <div class="form-group{{ $errors->has('student_number') ? ' has-error' : '' }}">
                            <label for="student_number" class="col-md-4 control-label">Student Number</label>

                            <div class="col-md-6">
                                <input id="student_number" type="number" class="form-control" name="student_number" value="{{ old('student_id', $session->student->student_number) }}" autofocus>

                                @if ($errors->has('student_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('student_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="subject" class="col-md-4 control-label">Subject</label>

                            <div class="col-md-6">
                                <select name="subject_id" class="form-control">
                                    @foreach($subjects_for_dropdown as $subject_id => $subject)
                                        <option
                                        value='{{ $subject_id }}'
                                        >{{ $subject }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tutor_id" class="col-md-4 control-label">Tutor</label>

                            <div class="col-md-6">
                                <select name="tutor_id" class="form-control">
                                    @foreach($tutors_for_dropdown as $user_id => $name)
                                        <option
                                        {{ ($user_id == Auth::id()) ? 'selected' : '' }}
                                        value='{{ $user_id }}'
                                        >{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Session
                                </button>
                                <button type="reset" class="btn btn-danger">
                                    Reset
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
