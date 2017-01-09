@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Profile</div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label for="name" class="control-label">Name</label>
                            <input class="form-control" name="name" type="text"
                                   value="{{ $user->name }}, {{ $user->firstname }}"
                                   id="name" disabled>
                        </div>

                        <div class="form-group">
                            <label for="birthdate" class="control-label">Birthdate</label>
                            <input class="form-control" name="birthdate" type="text"
                                   value="{{ $user->birthdate }}"
                                   id="birthdate" disabled>
                        </div>

                        <hr>

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

                        {!! Form::submit(null, ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
