<?php

// $address = "India+Panchkula";
// $url = "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=India";
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
// $response = curl_exec($ch);
// curl_close($ch);
// $response_a = json_decode($response);
// echo $lat = $response_a->results[0]->geometry->location->lat;
// echo "<br />";
// echo $long = $response_a->results[0]->geometry->location->lng;
function get_name_locations($all_date=null) {
  $address = document.getElementById("").value;
  $geocoder = new google.maps.Geocoder();
  $a = geocoder.geocode({address: address}, 
  function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
     searchLocationsNear(results[0].geometry.location);
    } else {
      alert(address + ' not found');
    }
  }
);
}
?>
