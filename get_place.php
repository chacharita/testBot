<?php
    $lat = "13.810128";
    $lng = "100.566324";
//     $data = file_get_contents("http://maps.google.com/maps/api/geocode/json?latlng=$lat,$lng&sensor=false");
//     $data = json_decode($data);
    $url      = file_get_contents("http://maps.google.com/maps/api/geocode/json?latlng=$lat,$lng&sensor=false");
    $response = json_decode($url);
    $location = $response->ResultSet->Results[0];
    foreach ((array) $location as $key => $value) {
            if($key == 'city')
                $city = $value;
            if($key == 'country')
                $country = $value;
            if($key == 'street')
                $street = $value;
    }
    echo "Street: ".$street."<br>";
    echo "City: ".$city;
    echo "<br/>Country: ".$country;



    ?>
