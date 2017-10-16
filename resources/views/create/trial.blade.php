@extends('layouts.layout')
@auth
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Trial</div>
                    <div class="panel-body">

                        <form class="form-horizontal" name="form" action="" method="get" >

                            <div class="form-group">
                                <label for="job_title" class="col-md-4 control-label">Title</label>
                                <div class="col-md-6">
                                    <input type="text" id="job_title" class="form-control" name="job_title" placeholder="Project/position name for your trial.">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="col-md-4 control-label">Description</label>
                                <div class="col-md-6">
                                    <input type="text" id="description" class="form-control" name="description" placeholder="Trial description.">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="start_date" class="col-md-4 control-label">Start Date</label>
                                <div class="col-md-6">
                                    <input type="date" id="start_date" class="form-control" name="start_date" placeholder=<?php echo "\"date(Y-m-d)\""; ?>>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="end_date" class="col-md-4 control-label">End Date</label>
                                <div class="col-md-6">
                                    <input type="date" id="end_date" class="form-control" name="end_date" placeholder=<?php echo "\"date(Y-m-d)\""; ?>>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="pay_rate" class="col-md-4 control-label">Pay</label>
                                <div class="col-md-6">
                                    <input type="text" id="pay_rate" class="form-control" name="pay_rate" placeholder="Pay rate (specify whether hourly, etc!)">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <input type="submit" class="btn btn-primary" value="Publish">
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if(isset($_GET['job_title']) && !empty($_GET['job_title'])) {

    $servername = "mysql.db.eluthas.com";
    $username = "mules";
    $password = "aG9j^9WbQrxCn&W";
    $dbname = "cody_dement_mules";

    $conn = new mysqli($servername, $username, $password, $dbname);
    $job_title = $conn->real_escape_string($_GET['job_title']);
    $start = $conn->real_escape_string($_GET['start_date']);
    $end = $conn->real_escape_string($_GET['end_date']);
    $pay = $conn->real_escape_string($_GET['pay_rate']);
    $description = $conn->real_escape_string($_GET['description']);

    $sql = ("INSERT INTO trials (organization_id,employee_id,job_title,start_date,end_date,pay_rate,description)
            VALUES (".Auth::user()->organization_id.",".Auth::id().",'$job_title','$start','$end','$pay','$description')");

    if ($conn->query($sql) != TRUE) {
        die("Error: " . $sql . "<br>" . $conn->error);
    }

    $trial_id = $conn->query('SELECT MAX(id) as id FROM trials');
    $conn->close();
    header("Location: /trial/".$trial_id->fetch_object()->id);
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