@extends('layouts.layout')
@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Skill</div>
                    <div class="panel-body">

                        <form class="form-horizontal" name="form" action="" method="get" >

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="name" class="form-control" name="name" placeholder="Your skill's name..">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="col-md-4 control-label">Description</label>
                                <div class="col-md-6">
                                    <input type="text" id="description" class="form-control" name="description" placeholder="Your skill's description..">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="type" class="col-md-4 control-label">Type</label>
                                <div class="col-md-6">
                                    <select id="type" class="form-control" name="type">
                                        <option value="soft">Soft Skill</option>
                                        <option value="hard">Hard Skill</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <input type="submit" class="btn btn-primary" value="Create">
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
    if(isset($_GET['name']) && !empty($_GET['name'])) {
    $servername = "mysql.db.eluthas.com";
    $username = "mules";
    $password = "aG9j^9WbQrxCn&W";
    $dbname = "cody_dement_mules";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $name = $conn->real_escape_string($_GET['name']);
    $description = $conn->real_escape_string($_GET['description']);

    $sql = "INSERT INTO requirements (name, description)
    VALUES ('$name', '$description')";

    if ($conn->query($sql) === TRUE) {
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
        header('Location: /skill');
        exit();
    }

?>
@endsection