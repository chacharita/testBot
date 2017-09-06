<?php

$lat = "13.905000";
    $lng = "100.519000";
    $data = file_get_contents("http://maps.google.com/maps/api/geocode/json?latlng=$lat,$lng&sensor=false");
    $data = json_decode($data);
    $add_array  = $data->results;
    $add_array = $add_array[0];
    $add_array = $add_array->address_components;
    $street_address = "Not found";
    $state = "Not found"; 
    $city = "Not found";
  foreach ($add_array as $key) {
    if($key->types[0] == 'political')
    {
      $city = $key->long_name;
    }
    // if($key->types[0] == 'administrative_area_level_1')
    // {
    //   $state = $key->long_name;
    // }
    // if($key->types[0] == 'street_address')
    // {
    //   $street_address = $key->long_name;
    // }
  }
    echo "City : ".$city;
    var_dump($city);
?>
