@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Users</div>

                    <div class="panel-body">
                        <ul>
                            <li>
                                <strong>Employees</strong>
                                <ul>
                                    @foreach($employees as $user)
                                        <li><a href="{{url('/user/'.$user->id)}}">{{ $user->id }} - {{ $user->name }}
                                                , {{ $user->firstname }}</a></li>
                                    @endforeach
                                </ul>
                            </li>

                            <li>
                                <strong>Professors</strong>
                                <ul>
                                    @foreach($professors as $user)
                                        <li><a href="{{url('/user/'.$user->id)}}">{{ $user->id }} - {{ $user->name }}
                                                , {{ $user->firstname }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <strong>Students</strong>
                                <ul>
                                    @foreach($students as $user)
                                        <li><a href="{{url('/user/'.$user->id)}}">{{ $user->id }} - {{ $user->name }}
                                                , {{ $user->firstname }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
