@extends('layouts.layout')


@php($applications = DB::table('applications')->where('user_id', Auth::id())->get())

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Submitted Applications</div>
                    @foreach($applications as $application)
                        <div>{{$application->description}}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
