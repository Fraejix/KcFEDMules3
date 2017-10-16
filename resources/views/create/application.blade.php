@extends('layouts.layout')
@auth
@section('content')

<div class="container">
    <div class="row">
        <div class="ol-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cover Letter</div>
                <form class="form-horizontal" name="form" action="" method="get" >
                                <textarea for="description" id="coverletter" class="form-control" rows="8" name="description" required autofocus>{{ Auth::user()->description }}</textarea>


                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>

<?php
if(isset($_GET['description']) && !empty($_GET['description'])) {
    $servername = "mysql.db.eluthas.com";
    $username = "mules";
    $password = "aG9j^9WbQrxCn&W";
    $dbname = "cody_dement_mules";

    $conn = new mysqli($servername, $username, $password, $dbname);
    $data = "1";

    $description = $conn->real_escape_string($_GET['description']);

    $sql = "INSERT INTO applications (user_id, trial_id, description)
    VALUES ('".Auth::id()."', '$data', '$description')";

    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header('Location: /application');
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
