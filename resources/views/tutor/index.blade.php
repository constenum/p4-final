@extends('layouts.master')

@section('content')

    <div class="container">
        @if(sizeof($tutors) == 0)
            <h3>There are no tutors in the system. Please contact tech support if you believe this is incorrect.</h3>
        @else
            <h1 class="text-center table-name">Tutors</h1>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Tutor ID</th>
                        <th>Tutor Name</th>
                        <th>Tutor Email</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tutors as $tutor)
                        <tr>
                            <td>{{ $tutor->id }}</td>
                            <td>{{ $tutor->name }}</td>
                            <td>{{ $tutor->email }}</td>
                            <td>
                                <a class="button btn btn-default" href="/tutor/{{ $tutor->id }}/edit">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                            </td>
                            <td>
                                <a class="button btn btn-default" href="/tutor/{{ $tutor->id }}/delete">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
