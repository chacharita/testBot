<?php
    $url      = 'http://where.yahooapis.com/geocode?location=13.716452,100.642881&gflags=R&flags=J';
    $response = json_decode(file_get_contents($url));
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
