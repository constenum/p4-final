@extends('layouts.master')

@section('content')
<div class="container">
    @if(sizeof($sessions) == 0)
        <h3>You have no open tutoring sessions. Please contact tech support if you believe this is incorrect.</h3>
    @else
        <h1 class="text-center table-name">Open Tutoring Sessions</h1>

        <a class="button btn btn-default" href="/sessions/create">
            <i class="fa fa-plus-square-o" aria-hidden="true"></i> Add New Tutoring Session</a>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th class="col-md-1"></th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Subject</th>
                    <th>Session Start</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($sessions as $session)
                    <tr>
                        <td></td>
                        <td>{{ $session->student->first_name }}</td>
                        <td>{{ $session->student->last_name }}</td>
                        <td>{{ $session->subject->subject }}</td>
                        <td>{{ $session->created_at }}</td>
                        <td>
                            <a class="button btn btn-default" href="/home/{{ $session->id }}">
                                <i class="fa fa-trash-o" aria-hidden="true"></i> End Session</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
