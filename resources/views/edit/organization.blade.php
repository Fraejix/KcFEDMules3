<link rel="stylesheet" type="text/css" href="../../public/css/forms.css">

@extends('layouts.layout')
@auth
@if(Auth::id() === DB::table('organizations')->where('id', $data)->value('owner_id'))
@section('content')
<?php
$servername = "mysql.db.eluthas.com";
$username = "mules";
$password = "aG9j^9WbQrxCn&W";
$dbname = "cody_dement_mules";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT id, owner_id, name, address, city, state, zip FROM organizations WHERE id=" . $data;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        ?>
<div class="container">
    <div class="row">
        <div class="ol-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Organization</div>
                <div class="panel-body">

                    <form class="form-horizontal" name="form" action="" method="get" >

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input type="text" id="name" class="form-control" name="name" value="{{$row['name']}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address" class="col-md-4 control-label">Address</label>
                            <div class="col-md-6">
                                <input type="text" id="address" class="form-control" name="address" value="{{$row['address']}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="city" class="col-md-4 control-label">City</label>
                            <div class="col-md-6">
                                <input type="text" id="city" class="form-control" name="city" value="{{$row['city']}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="state" class="col-md-4 control-label">State</label>
                            <div class="col-md-6">
                                <input type="text" id="state" class="form-control" name="state" value="{{$row['state']}}">
                            </div>
                        </div>

                        <div class="form-group">

                            <label for="zipcode" class="col-md-4 control-label">Zip Code</label>
                            <div class="col-md-6">
                                <input type="text" id="zcode" class="form-control" name="zipcode" value="{{$row['zip']}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <input type="submit" class="btn btn-primary" value="Update">
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
    }
} else {
    echo "0 results";
}

if(isset($_GET['name']) && !empty($_GET['name'])) {

    $name = $conn->real_escape_string($_GET['name']);
    $address = $conn->real_escape_string($_GET['address']);
    $city = $conn->real_escape_string($_GET['city']);
    $state = $conn->real_escape_string($_GET['state']);
    $zipcode = $conn->real_escape_string($_GET['zipcode']);

    $sql = "UPDATE organizations SET name='$name', address='$address', city='$city', state='$state', zip='$zipcode' WHERE id=" . $data;

    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    header('Location: /organization/'.$data);
    exit();
}
?>
@endsection
@else
    <?php
    header('Location: /login');
    exit();
    ?>
@endif
@else
    <?php
    header('Location: /login');
    exit();
    ?>
@endauth
