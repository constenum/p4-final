@extends('layouts.master')

@section('content')

    <div class="container">
        @if(sizeof($students) == 0)
            <h3>There are no students in the system. Please contact tech support if you believe this is incorrect.</h3>
        @else
            <h1 class="text-center">Students</h1>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                      <th>Student Number</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Card Number</th>
                      <th></th>
                      <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                          <td>{{ $student->student_number }}</td>
                          <td>{{ $student->first_name }}</td>
                          <td>{{ $student->last_name}}</td>
                          <td>{{ $student->card_number }}</td>
                          <td>
                              <a class="button btn btn-default" href="/students/{{ $student->id }}/edit">
                                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                          </td>
                          <td>
                              <a class="button btn btn-default" href="/students/{{ $student->id }}/delete">
                                  <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                          </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
