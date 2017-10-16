@extends('layouts.layout')
@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <?php
                        $organizations = DB::table('organizations')->where('id', $data)->get();
                        $trials = DB::table('trials')->where('organization_id', $data)->get();
                        ?>
                        @foreach($organizations as $organization)
                            <div class="panel-heading">{{$organization->name}}</div>
                            <div>Address: {{$organization->address}} {{$organization->city}}, {{$organization->state}} {{$organization->zip}} </div>
                            <p>{{$organization->description}}</p>
                        @endforeach
                        <h3>Trials</h3>
                        @foreach($trials as $trial)
                            <div class="panel-heading">{{$trial->job_title}}</div>
                            <div>Start Date: {{$trial->start_date}}</div>
                            <div>End Date: {{$trial->end_date}}</div>
                            <div>Pay Rate: {{$trial->pay_rate}}</div>
                            <p>{{$trial->description}}</p>
                        @endforeach

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
