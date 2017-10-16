@extends('layouts.layout')
@auth
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    @php($applications = DB::table('applications')->where('id', $data)->get())
                    @foreach($applications as $application)
                        @if($application->user_id === Auth::id())
                            @php($trials = DB::table('trials')->where('id', $application->trial_id)->get())
                            @foreach($trials as $trial)
                                <div class="panel-heading">Application for <a href="/trial/{{$trial->id}}">{{$trial->job_title}}</a></div>
                                <div><b>Cover Letter</b> {{$application->description}} </div>
                            @endforeach
                        @else
                            <?php
                            header('Location: /');
                            exit();
                            ?>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@else
    <?php
    header('Location: /login');
    exit();
    ?>
@endauth