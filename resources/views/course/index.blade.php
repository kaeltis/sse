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
                            <ul>
                                @foreach($courses as $course)
                                    <li><a href="{{url('/course/'.$course->id)}}">{{$course->id}}
                                            - {{ $course->semester }}
                                            - {{ $course->name }}
                                            @if(Auth::user()->isStudent())
                                                - {{ $course->pivot->grade }}
                                            @endif
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <h2>No courses found!</h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
