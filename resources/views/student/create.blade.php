@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">New Student</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="/students">
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

                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <label for="first_name" class="col-md-4 control-label">First Name</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">

                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <label for="last_name" class="col-md-4 control-label">Last Name</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">

                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('last_name') }}</strong>
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
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Add Student
                                    </button>
                                    <button type="reset" class="btn btn-danger">
                                        Reset
                                    </button>
                                    <a class="button btn btn-default" href="/students">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
