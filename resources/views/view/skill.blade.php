@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <?php
                    $skills = DB::table('requirements')->where('id', $data)->get();
                    ?>
                    @foreach($skills as $skill)
                            <div class="panel-heading">{{$skill->name}}</div>
                            <div>{{$skill->description}}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Users</div>
                    <?php
                    $usersID = DB::table('link_requirements_users')->where('requirement_id', $data)->get();

                    ?>
                    @foreach($usersID as $userID)
                        @php($users = DB::table('users')->where('id', $userID->user_id)->get())
                            @foreach($users as $user)
                                <a href="/account/{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</a>
                                </br>
                            @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Trials</div>
                    <?php
                    $trialsID = DB::table('link_requirements_trials')->where('requirement_id', $data)->get();
                    ?>
                    @foreach($trialsID as $trialID)
                        @php($trials = DB::table('trials')->where('id', $trialID->trial_id)->get())
                        @foreach($trials as $trial)
                            <a href="/trial/{{$trial->id}}">{{$trial->job_title}}</a>
                            </br>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection