<?php

$lat = "13.60845";
      $lng = "100.54164";
      $data = file_get_contents("http://maps.google.com/maps/api/geocode/json?latlng=$lat,$lng&sensor=false");
      $data = json_decode($data);
      $add_array  = $data->results;
      $add_array = $add_array[0];
      $add_array = $add_array->address_components;
      $country = "Not found";
      $state = "Not found"; 
      $city = "Not found";
      foreach ($add_array as $key) {
        if($key->types[0] == 'administrative_area_level_2')
        {
          $city = $key->long_name;
        }
        if($key->types[0] == 'administrative_area_level_1')
        {
          $state = $key->long_name;
        }
        if($key->types[0] == 'route')
        {
          $country = $key->long_name;
        }
      }
      echo "Country : ".$country." ,State : ".$state." ,City : ".$city;
?>
