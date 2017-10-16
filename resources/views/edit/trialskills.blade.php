@extends('layouts.layout')
@auth
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Skills</div>

                    <div class="panel-body">
                        <form class="form-horizontal" name="form" action="" method="get">
                            {{ csrf_field() }}
                            @php($softSkills = DB::table('requirements')->where('type', 'soft')->get())
                            @php($hardSkills = DB::table('requirements')->where('type','hard')->get())
                            <div class="form-group">
                                <label for="requirement_ids" class="col-md-4 control-label">Soft Skills</label>
                                <div class="col-md-6">
                                    <select id="softskills" type="text" class="form-control" name="softskills[]" multiple>
                            @foreach($softSkills as $skill)
                                <option value="{{$skill->id}}">{{$skill->name}}</option>
                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="requirement_ids" class="col-md-4 control-label">Hard Skills</label>
                                <div class="col-md-6">
                                    <select id="hardskills" type="text" class="form-control" name="hardskills[]" multiple>
                                        @foreach($hardSkills as $skill)
                                            <option value="{{$skill->id}}">{{$skill->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if((isset($_GET['softskills']) && !empty($_GET['softskills'])) || (isset($_GET['hardskills']) && !empty($_GET['hardskills'])))
    {
        $servername = "mysql.db.eluthas.com";
        $username = "mules";
        $password = "aG9j^9WbQrxCn&W";
        $dbname = "cody_dement_mules";

        $conn = new mysqli($servername, $username, $password, $dbname);

        $sql = "DELETE FROM link_requirements_trials WHERE trial_id=". $data;
        if ($conn->query($sql) === TRUE) {
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        if(isset($_GET['softskills']) && !empty($_GET['softskills']))
        {
            $softskills = $_GET['softskills'];
            foreach ($softskills as $skill)
            {
                $requirement_id = $conn->real_escape_string($skill);
                $sql = "INSERT INTO link_requirements_users (requirement_id, trial_id) VALUES ($requirement_id, ".$data.")";
                if ($conn->query($sql) === TRUE) {
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
        if(isset($_GET['hardskills']) && !empty($_GET['hardskills']))
        {
            $hardskills = $_GET['hardskills'];
            foreach ($hardskills as $skill)
            {
                $requirement_id = $conn->real_escape_string($skill);
                $sql = "INSERT INTO link_requirements_trials (requirement_id, trial_id) VALUES ($requirement_id, ".$data.")";
                if ($conn->query($sql) === TRUE) {
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
        $conn->close();
        header('Location: /account');
        exit();
    }
    ?>

@endsection
@else
    <?php
    header('Location: /login');
    exit();
    ?>
    @endauth