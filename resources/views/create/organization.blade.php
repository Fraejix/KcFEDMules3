
@extends('layouts.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="ol-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">New Organization</div>
                    <div class="panel-body">

                        <form class="form-horizontal" name="form" action="" method="get" >

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="name" class="form-control" name="name" placeholder="Your organization's name..">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="address" class="col-md-4 control-label">Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="address" class="form-control" name="address" placeholder="Your organization's address..">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="city" class="col-md-4 control-label">City</label>
                                <div class="col-md-6">
                                    <input type="text" id="city" class="form-control" name="city" placeholder="Your organization's city..">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="state" class="col-md-4 control-label">State</label>
                                <div class="col-md-6">
                                    <input type="text" id="state" class="form-control" name="state" placeholder="Your organization's state..">
                                </div>
                            </div>

                            <div class="form-group">

                                <label for="zipcode" class="col-md-4 control-label">Zip Code</label>
                                <div class="col-md-6">
                                    <input type="text" id="zcode" class="form-control" name="zipcode" placeholder="Your organization's zip code..">
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

    $name = $conn->real_escape_string(_GET['name']);
    $address = $conn->real_escape_string($_GET['address']);
    $city = $conn->real_escape_string($_GET['city']);
    $state = $conn->real_escape_string($_GET['state']);
    $zipcode = $conn->real_escape_string($_GET['zipcode']);

    $sql = "INSERT INTO organizations (owner_id, name, address, city, state, zip)
    VALUES ('".Auth::id()."', '$name', '$address', '$city', '$state', '$zipcode')";

    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
@endsection
