@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">User - {{$user->id}}</div>

                    <div class="panel-body">

                        <table class="table table-striped">
                            <tr>
                                <td>Role</td>
                                <td>{!! \App\User::$roles[$user->role] !!}</td>
                            </tr>
                            <tr>
                                <td>Lastname</td>
                                <td>{!! $user->name !!}</td>
                            </tr>
                            <tr>
                                <td>Firstname</td>
                                <td>{!! $user->firstname !!}</td>
                            </tr>
                            <tr>
                                <td>Birthdate</td>
                                <td>{!! $user->birthdate !!}</td>
                            </tr>
                            <tr>
                                <td>Street</td>
                                <td>{!! $user->street !!}</td>
                            </tr>
                            <tr>
                                <td>House Number</td>
                                <td>{!! $user->housenumber !!}</td>
                            </tr>
                            <tr>
                                <td>ZIP-Code</td>
                                <td>{!! $user->zipcode !!}</td>
                            </tr>
                            <tr>
                                <td>City</td>
                                <td>{!! $user->city !!}</td>
                            </tr>
                            <tr>
                                <td>E-Mail</td>
                                <td>{!! $user->email !!}</td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>{!! $user->phone !!}</td>
                            </tr>
                        </table>

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
