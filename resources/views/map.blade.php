@extends('layouts/home')
<div id="map"></div>

<div id = "sidemenu">
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
    $list = array();
    $fulladdress = "";
    $nameList = array();
    $idList = array();

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<h4><a href='organization/".$row["id"]."'>".$row["name"]."</a></h4>";
            array_push($nameList, $row["name"]);
            echo $row["address"]."<br>";
            $fulladdress = ($row["address"]) . ($row["zip"]);
            array_push($list, $fulladdress);
            array_push($idList, $row["id"]);
        }
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>
</div>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB3ry6QtLgjCDmeGHFIhPJ8MvfEVqXVL8Y&callback=initMap">
</script>

<script>
    function setMarker(position, map) {
        var marker = new google.maps.Marker({
            position: position,
            map: map
        });
        var infowindow = new google.maps.InfoWindow({
            content: "You"
        });
        marker.addListener('mouseover', function () {
            infowindow.open(map, marker);
        });
        marker.addListener('mouseout', function () {
            infowindow.close();
        });
    }
    function geoCoder(address, map, name, id){
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({'address': address}, function(results, status) {
            if (status === 'OK') {
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                });
                var infowindow = new google.maps.InfoWindow({
                    content: name
                });
                marker.addListener('mouseover', function () {
                    infowindow.open(map, marker);
                });
                marker.addListener('mouseout', function () {
                    infowindow.close();
                });
                marker.addListener('click', function() {
                   document.location.href = "https://mules.codydement.com/organization/" + parseInt(id);
                });
            } else {
                alert('Geocode was not succesful ' + status);
            }
        });
    }

    var map;
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 38.932, lng: -94.390},
            zoom: 8
        });

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                setMarker(pos, map);

                //For loop for all items in the database that have a address
                var addresses = [<?php echo '"'.implode('","', $list).'"' ?>];
                var names = [<?php echo '"'.implode('","', $nameList).'"' ?>];
                var ids = [<?php echo '"'.implode('","', $idList).'"' ?>];

                for(var x = 0; x < addresses.length; x++){
                    geoCoder(addresses[x], map, names[x], ids[x]);

                }


                map.setCenter(pos);
            });
        }
    }
    //document.getElementById("sidemenu").innerHTML = "This is a test";
    //    select location from org/address
</script>
