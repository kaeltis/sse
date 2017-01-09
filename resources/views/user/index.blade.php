@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Users</div>

                    <div class="panel-body">
                        <h1>Employees</h1>
                        @foreach($employees as $user)
                            <a href="{{url('/user/'.$user->id)}}">{{ $user->id }} - {{ $user->name }}, {{ $user->firstname }}</a><br>
                        @endforeach

                        <h1>Professors</h1>
                        @foreach($professors as $user)
                            <a href="{{url('/user/'.$user->id)}}">{{ $user->id }} - {{ $user->name }}, {{ $user->firstname }}</a><br>
                        @endforeach

                        <h1>Students</h1>
                        @foreach($students as $user)
                            <a href="{{url('/user/'.$user->id)}}">{{ $user->id }} - {{ $user->name }}, {{ $user->firstname }}</a><br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
