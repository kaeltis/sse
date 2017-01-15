@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$user->name}}, {{$user->firstname}} - Shared Grades</div>

                    <div class="panel-body">
                        <table class="table table-striped">
                            <tr>
                                <th>Course</th>
                                <th>Grade</th>
                            </tr>
                            @foreach($courses as $course)
                                <tr>
                                    <td>{{$course->name}}</td>
                                    <td>{{$course->pivot->grade}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
