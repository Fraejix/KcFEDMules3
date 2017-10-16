@extends('layouts.layout')
@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Soft Skills</div>
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

                    $sql = "SELECT id, name, description FROM requirements WHERE type='soft' ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0)
                    {

                        echo "
                            <table class ='table'>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                </tr>
                            ";
                        // output data of each row
                        while($row = $result->fetch_assoc())
                        {
                            echo "
                                <tr>
                                    <td>
                                        <a href='skill/".$row["id"]."' >".$row["name"]." </a>
                                     </td>
                                     <td>
                                        ".$row["description"]."
                                     </td>
                                     <td>
                                         <button type='button' class='button'>
                                            <a href='edit/skill/".$row["id"]."'>Edit</a>
                                         </button>
                                     </td>
                                </tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 results";
                    }
                    $sql = "SELECT id, name, description FROM requirements WHERE type='hard'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0)
                    {

                        echo "
                </div>
            </div>
        </div>
    </div>
<div class='container''>
        <div class='row''>
            <div class='col-md-8 col-md-offset-2''>
                <div class='panel panel-default'>
                        <div class='panel-heading'>Hard Skills</div>
                            <table class ='table'>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                </tr>
                            ";
                        // output data of each row
                        while($row = $result->fetch_assoc())
                        {
                            echo "
                                <tr>
                                    <td>
                                        <a href='skill/".$row["id"]."' >".$row["name"]." </a>
                                     </td>
                                     <td>
                                        ".$row["description"]."
                                     </td>
                                     <td>
                                         <button type='button' class='button'>
                                            <a href='edit/skill/".$row["id"]."'>Edit</a>
                                         </button>
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