@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    @php($user = DB::table('users')->where('id', $data)->get())
                    @foreach($user as $user)
                        <div class="panel-heading">{{$user->first_name}} {{$user->last_name}}</div>
                        <div><b>Birth date:</b> {{$user->birthdate}}</div>
                        <div><b>Email: </b>{{$user->email}}</div>
                        <div><b>Phone Number:</b> {{$user->phone_number}}</div>
                        <div><b>Major:</b> {{$user->field}}</div>
                        <div><b>Biography:</b></div>
                        <p>{{$user->biography}}</p>
                    @endforeach

                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Skills</div>
                    @php($skillsID = DB::table('link_requirements_users')->where('user_id', $user->id)->get())
                    @foreach($skillsID as $skillID)
                        @php($skills = DB::table('requirements')->where('id', $skillID->requirement_id)->get())
                        @foreach($skills as $skill)
                            <a href="/skill/{{$skill->id}}"> {{$skill->name}} </a></br>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection