@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Course - {{$course->id}}</div>

                    <div class="panel-body">
                        <table class="table table-striped">
                            <tr>
                                <td><strong>Name</strong></td>
                                <td>{{$course->name}}</td>
                            </tr>
                            <tr>
                                <td><strong>Semester</strong></td>
                                <td>{{$course->semester}}</td>
                            </tr>
                            @if(Auth::user()->isStudent())
                                <tr>
                                    <td>Grade</td>
                                    @if($course->pivot->grade)
                                        <td>{{$course->pivot->grade}}</td>
                                    @else
                                        <td>none</td>
                                    @endif
                                </tr>
                            @endif
                        </table>

                        @if(Auth::user()->isEmployee() || Auth::user()->isProfessor())
                            <hr>

                            <h3>Course Members</h3>
                            <table class="table table-striped">
                                <tr>
                                    <th>ID</th>
                                    <th>Grade</th>
                                </tr>
                                @if($course->members)
                                    @foreach($course->members as $member)
                                        <tr>
                                            <td>{{ $member->id }}</td>
                                            <td>{{ $member->pivot->grade }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="2">none</td>
                                    </tr>
                                @endif
                            </table>
                            <hr>

                            <h4>Add Grade</h4>
                            {!! Form::open(['route' => ['course.adduser', $course->id]]) !!}

                            <div class="form-group">
                                {{ Form::label('userid', 'UserID', ['class' => 'control-label']) }}
                                {{ Form::number('userid', null, ['class' => 'form-control', 'required']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('grade', 'Grade', ['class' => 'control-label']) }}
                                {{ Form::number('grade', null, ['class' => 'form-control', 'required']) }}
                            </div>

                            {!! Form::submit('Add', ['class' => 'btn btn-primary btn-xs']) !!}
                            {!! Form::close() !!}

                            <hr>

                            <a href="{{url('/course/'.$course->id.'/edit')}}" class="btn btn-primary">Edit Course</a>
                            <hr>
                            {!! Form::model($course, ['route' => ['course.destroy', $course->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete Course', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
