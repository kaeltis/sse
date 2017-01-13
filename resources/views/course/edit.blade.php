@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Course - {{$course->id}}</div>

                    <div class="panel-body">
                        {!! Form::model($course, ['route' => ['course.update', $course->id], 'method' => 'put']) !!}

                        <div class="form-group">
                            {{ Form::label('name', 'Name', ['class' => 'control-label']) }}
                            {{ Form::text('name', $course->name, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('semester', 'Semester', ['class' => 'control-label']) }}
                            {{ Form::text('semester', $course->semester, ['class' => 'form-control']) }}
                        </div>

                        <hr>

                        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
