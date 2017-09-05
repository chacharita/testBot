<?php
//     $url      = 'http://where.yahooapis.com/geocode?location=13.716452,100.642881&gflags=R&flags=J';
//     $response = json_decode(file_get_contents($url));
//     $location = $response->ResultSet->Results[0];
//     foreach ((array) $location as $key => $value) {
//             if($key == 'city')
//                 $city = $value;
//             if($key == 'country')
//                 $country = $value;
//             if($key == 'street')
//                 $street = $value;
//     }
//     echo "Street: ".$street."<br>";
//     echo "City: ".$city;
//     echo "<br/>Country: ".$country;

// Google GeoCode API
$address = 'dentist+austin+texas';

$array = getGoogleGeoCode($address);
$array = $array['results'];

//var_dump($array);

foreach($array as $index => $component)
{
    echo '#' . $index . ' ' . $component['formatted_address'] . ', ' ;

    // subsequent request for "Place Details"
    $details = getGooglePlaceDetails($component['place_id']);
    $details = $details['result'];
    //var_dump($details);

    echo 'Phone: ' . $details['formatted_phone_number']. ', ' ;

    // rating contains the place's rating, from 1.0 to 5.0, based on aggregated user reviews.
    if(isset($details['rating'])) {
        echo 'Rating: ' . $details['rating'];
    }

    // show only the first two entries
    /*if($index === 1) {
        break;
    }*/

    echo '<br>';
}

function getGooglePlaceDetails($placeid)
{
    // your google API key
    $key = 'AIzaSyCj9yH5x6_5_Om8ebAO2pBlaqJZB-TIViY';
    $url = 'https://maps.googleapis.com/maps/api/place/details/json?placeid=' . $placeid . '&key=' . $key;

    return curlRequest($url);
}

function getGoogleGeoCode($address)
{
    $url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $address;

    return curlRequest($url);
}

function curlRequest($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

    ?>
