@extends('layouts.master')

@section('content')

    <div class="container">
        @if(sizeof($subjects) == 0)
            <h3>There are no subjects in the system. Please contact tech support if you believe this is incorrect.</h3>
        @else
            <h1 class="text-center">Subjects</h1>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                      <th>Subjects</th>
                      <th></th>
                      <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subjects as $subject)
                        <tr>
                          <td>{{ $subject->subject }}</td>
                          <td>
                              <a class="button btn btn-default" href="/subject/{{ $subject->id }}/edit">
                                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                          </td>
                          <td>
                              <a class="button btn btn-default" href="/subject/{{ $subject->id }}/delete">
                                  <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                          </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
