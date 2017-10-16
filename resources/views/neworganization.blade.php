<link rel="stylesheet" type="text/css" href="../../public/css/forms.css">

@extends('layouts.layout')

@section('content')
<div>
    <form name="form" action="" method="get">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Your organization's name..">

        <label for="address">Address</label>
        <input type="text" id="address" name="address" placeholder="Your organization's address..">

        <label for="city">City</label>
        <input type="text" id="city" name="city" placeholder="Your organization's city..">

        <label for="state">State</label>
        <input type="text" id="state" name="state" placeholder="Your organization's state..">

        <label for="zipcode">Zip Code</label>
        <input type="text" id="zcode" name="zipcode" placeholder="Your organization's zip code..">

        <input type="submit" value="Submit">
    </form>
</div>

<?php
if(isset($_GET['name']) && !empty($_GET['name'])) {
    $servername = "mysql.db.eluthas.com";
    $username = "mules";
    $password = "aG9j^9WbQrxCn&W";
    $dbname = "cody_dement_mules";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $name = $_GET['name'];
    $address = $_GET['address'];
    $city = $_GET['city'];
    $state = $_GET['state'];
    $zipcode = $_GET['zipcode'];

    $sql = "INSERT INTO organizations (owner_id, name, address, city, state, zip)
    VALUES ('4', '$name', '$address', '$city', '$state', '$zipcode')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
@endsection
