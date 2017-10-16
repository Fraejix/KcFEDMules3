@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                @php($trials = DB::table('trials')->where('id', $data)->get())
                @foreach($trials as $trial)
                    <div class="panel-heading">{{$trial->job_title}}</div>
                    <div>Start Date: {{$trial->start_date}}</div>
                    <div>End Date: {{$trial->end_date}}</div>
                    <div>Pay Rate: {{$trial->pay_rate}}</div>
                    <p>{{$trial->description}}</p>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Skills</div>
                        @php($skillsID = DB::table('link_requirements_trials')->where('trial_id', $data)->get())
                        @foreach($skillsID as $skillID)
                            @php($softskill = DB::table('requirements')->where('id', $skillID->requirement_id)->where('type', 'soft')->get())
                            @php($hardskill = DB::table('requirements')->where('id', $skillID->requirement_id)->where('type', 'hard')->get())

                        @foreach($softskill as $skill)
                            <div><a href="/skill/{{$skill->id}}">{{$skill->name}}</a></div>
                        @endforeach

                        @foreach($hardskill as $skill)
                            <div><a href="/skill/{{$skill->id}}">{{$skill->name}}</a></div>
                        @endforeach
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection