@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">User - {{$user->id}}</div>

                    <div class="panel-body">
                        <div class="form-group">
                            {{ Form::label('name', 'Lastname', ['class' => 'control-label']) }}
                            {{ Form::text('name', $user->name, ['class' => 'form-control', 'disabled']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('firstname', 'Firstname', ['class' => 'control-label']) }}
                            {{ Form::text('firstname', $user->firstname, ['class' => 'form-control', 'disabled']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('birthdate', 'Birthdate', ['class' => 'control-label']) }}
                            {{ Form::date('birthdate', $user->birthdate, ['class' => 'form-control', 'disabled']) }}
                        </div>

                        <hr>

                        <div class="form-group">
                            {{ Form::label('street', 'Street', ['class' => 'control-label']) }}
                            {{ Form::text('street', $user->street, ['class' => 'form-control', 'disabled']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('housenumber', 'House Number', ['class' => 'control-label']) }}
                            {{ Form::text('housenumber', $user->housenumber, ['class' => 'form-control', 'disabled']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('zipcode', 'ZIP-Code', ['class' => 'control-label']) }}
                            {{ Form::text('zipcode', $user->zipcode, ['class' => 'form-control', 'disabled']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('city', 'City', ['class' => 'control-label']) }}
                            {{ Form::text('city', $user->city, ['class' => 'form-control', 'disabled']) }}
                        </div>

                        <hr>

                        <div class="form-group">
                            {{ Form::label('email', 'E-Mail', ['class' => 'control-label']) }}
                            {{ Form::email('email', $user->email, ['class' => 'form-control', 'disabled']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('phone', 'Phone', ['class' => 'control-label']) }}
                            {{ Form::text('phone', $user->phone, ['class' => 'form-control', 'disabled']) }}
                        </div>
                        <hr>

                        <div class="form-group">
                            {{ Form::label('role', 'Role', ['class' => 'control-label']) }}
                            {{ Form::select('role', \App\User::$roles, $user->role, ['class' => 'form-control', 'disabled']) }}
                        </div>

                        <hr>

                        @if(Auth::user()->id == $user->id || Auth::user()->isEmployee())
                            <a href="{{url('/user/'.$user->id.'/edit')}}" class="btn btn-primary">Edit Profile</a>
                        @endif

                        @if(Auth::user()->isEmployee())
                            <hr>

                            {!! Form::model($user, ['route' => ['user.destroy', $user->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete User', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
