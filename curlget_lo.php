<?php

$lat = "13.781550";
$lon = "100.543700";
$address = $lat.$lon;
function get_lat_long($address){
 
sleep(5);
 
$address = str_replace(" ", "+", $address);
 
$region = 'TH';
 
$url =    "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=$region";
 
$ch = curl_init();
 
curl_setopt($ch, CURLOPT_URL, $url);
 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 
curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
 
$response = curl_exec($ch);
 
curl_close($ch);
 
$response_a = json_decode($response);
 
$lat = $response_a->results[0]->geometry->location->lat;
 
$long = $response_a->results[0]->geometry->location->lng;
 
$latlon = array($lat, $long);
 
var_dump($response_a);
 
var_dump($latlon);
 
return $latlon;
 
}
?>
