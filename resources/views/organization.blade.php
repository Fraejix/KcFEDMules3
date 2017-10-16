@extends('layouts.layout')
@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Organization</div>
                    <?php
                    $servername = "mysql.db.eluthas.com";
                    $username = "mules";
                    $password = "aG9j^9WbQrxCn&W";
                    $dbname = "cody_dement_mules";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT id, owner_id, name, address, city, state, zip FROM organizations";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0)
                    {

                        echo "
                            <table class ='table'>
                                <tr>
                                    <th>Organization</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>ZIP</th>
                                </tr>
                            ";
                        // output data of each row
                        while($row = $result->fetch_assoc())
                        {
                            echo "
                                <tr>
                                    <td>
                                        <a href='organization/".$row["id"]."' >".$row["name"]." </a>
                                     </td>
                                     <td>
                                        ".$row["address"]."
                                     </td>
                                     <td>
                                        ".$row["city"]."
                                     </td>
                                     <td>
                                        ".$row["state"]."
                                     </td>
                                     <td>
                                        ".$row["zip"]."
                                     </td>
                                </tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 results";
                    }

                    $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
