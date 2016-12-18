@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tutoring Session</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/sessions">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('student_number') ? ' has-error' : '' }}">
                            <label for="student_number" class="col-md-4 control-label">Student Number</label>

                            <div class="col-md-6">
                                <input id="student_number" type="number" class="form-control" name="student_number" value="{{ old('student_number') }}" autofocus>

                                @if ($errors->has('student_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('student_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('card_number') ? ' has-error' : '' }}">
                            <label for="card_number" class="col-md-4 control-label">Card Number</label>

                            <div class="col-md-6">
                                <input id="card_number" type="number" class="form-control" name="card_number" value="{{ old('card_number') }}">

                                @if ($errors->has('card_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('card_number') }}</strong>
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
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Start Session
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
