@extends('layouts.master')

@section('content')

    <div class="container">
        @if(sizeof($sessions) == 0)
            <h3>There are no sessions in the system. Please contact tech support if you believe this is incorrect.</h3>
        @else
            <h1 class="text-center table-name">Sessions</h1>

            <a class="button btn btn-default" href="/sessions/create">
                <i class="fa fa-plus-square-o" aria-hidden="true"></i> Manually Add Tutoring Session</a>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Session ID</th>
                        <th>Student Name</th>
                        <th>Subject</th>
                        <th>Session Start</th>
                        <th>Session Updated</th>
                        <th>Tutor Name</th>
                        <th>Session Ended</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sessions as $session)
                        <tr>
                            <td>{{ $session->id }}</td>
                            <td>{{ $session->student->first_name }} {{ $session->student->last_name }}</td>
                            <td>{{ $session->subject->subject }}</td>
                            <td>{{ $session->created_at }}</td>
                            <td>{{ $session->updated_at }}</td>
                            <td>{{ $session->user->name }}</td>
                            @if ($session->session_ended)
                                <td class="text-center">yes</td>
                            @else
                                <td></td>
                            @endif
                            <td>
                                <a class="button btn btn-default" href="/sessions/{{ $session->id }}/edit">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                            </td>
                            <td>
                                <a class="button btn btn-default" href="/sessions/{{ $session->id }}/delete">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
