@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Courses
                        @if(Auth::user()->isEmployee() || Auth::user()->isProfessor())
                            <a href="{{url('/course/create')}}" class="btn btn-success btn-xs pull-right">Create</a>
                        @else
                            <a href="{{url('/user/share/'.Auth::user()->id.'/'.Auth::user()->sharetoken)}}"
                               class="pull-right">Use this URL to share</a>
                        @endif
                    </div>

                    <div class="panel-body">
                        @if(count($courses))
                            <table class="table table-striped">
                                <tr>
                                    <th>ID</th>
                                    <th>Semester</th>
                                    <th>Name</th>
                                </tr>
                                @foreach($courses as $course)
                                    <tr>
                                        <td><a href="{{url('/course/'.$course->id)}}"
                                               class="btn btn-primary btn-xs">{{$course->id}}</a></td>
                                        <td>{{ $course->semester }}</td>
                                        <td>{{ $course->name }}</td>
                                        </li>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            <h2>No courses found!</h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
