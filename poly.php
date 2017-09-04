<?php
$address = "Kathmandu, Nepal";
$url = "http://maps.google.com/maps/api/geocode/json?address=".urlencode($address);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    
$responseJson = curl_exec($ch);
curl_close($ch);

$response = json_decode($responseJson);

if ($response->status == 'OK') {
    $latitude = $response->results[0]->geometry->location->lat;
    $longitude = $response->results[0]->geometry->location->lng;

    echo 'Latitude: ' . $latitude;
    echo '<br />';
    echo 'Longitude: ' . $longitude;
} else {
    echo $response->status;
    var_dump($response);
}    
?>
