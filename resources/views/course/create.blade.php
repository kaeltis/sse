@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Course</div>

                    <div class="panel-body">
                        {!! Form::open(['route' => ['course.store']]) !!}

                        <div class="form-group">
                            {{ Form::label('name', 'Name', ['class' => 'control-label']) }}
                            {{ Form::text('name', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('semester', 'Semester', ['class' => 'control-label']) }}
                            {{ Form::text('semester', null, ['class' => 'form-control']) }}
                        </div>

                        <hr>

                        {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
