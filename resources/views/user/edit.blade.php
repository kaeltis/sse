@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit User - {{$user->id}}</div>

                    <div class="panel-body">
                        {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'put']) !!}

                        <div class="form-group">
                            {{ Form::label('street', 'Street', ['class' => 'control-label']) }}
                            {{ Form::text('street', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('housenumber', 'House Number', ['class' => 'control-label']) }}
                            {{ Form::text('housenumber', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('zipcode', 'ZIP-Code', ['class' => 'control-label']) }}
                            {{ Form::text('zipcode', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('city', 'City', ['class' => 'control-label']) }}
                            {{ Form::text('city', null, ['class' => 'form-control']) }}
                        </div>

                        <hr>

                        <div class="form-group">
                            {{ Form::label('email', 'E-Mail', ['class' => 'control-label']) }}
                            {{ Form::email('email', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('phone', 'Phone', ['class' => 'control-label']) }}
                            {{ Form::text('phone', null, ['class' => 'form-control']) }}
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
