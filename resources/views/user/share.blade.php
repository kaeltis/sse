@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Shared Grades</div>

                    <div class="panel-body">
                        <h1>{{$user->name}}, {{$user->firstname}}</h1>
                        <ul>
                            @foreach($courses as $course)
                                <li>{{$course->name}} - {{$course->pivot->grade}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
