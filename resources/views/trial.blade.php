@extends('layouts.layout')
@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Trial</div>
                    <table class ='table'>
                        <tr>
                            <th>Job Title</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Pay rate</th>
                            <th>Description</th>
                        </tr>
                    @php($trials = DB::table('trials')->get())
                    @foreach($trials as $trial)
                        <tr>
                            <td><a href="trial/{{$trial->id}}">{{$trial->job_title}}</a></td>
                            <td>{{$trial->start_date}}</td>
                            <td>{{$trial->end_date}}</td>
                            <td>{{$trial->pay_rate}}</td>
                            <td>{{$trial->description}}</td>
                        </tr>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection