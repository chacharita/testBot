<?php
// $deal_lat=13.60845;
// $deal_long=100.54164;
// $geocode=file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng='.$deal_lat.','.$deal_long.'&sensor=false');

//         $output= json_decode($geocode);

//     for($j=0;$j<count($output->results[0]->address_components);$j++){
//                $cn=array($output->results[0]->address_components[$j]->types[0]);
//            if(in_array("plate", $cn))
//            {
//             $country= $output->results[0]->address_components[$j]->long_name;
//            }
//             }
//             echo $country;
$lat = "13.770334";
$lng = "100.080591";
$data = file_get_contents("http://maps.google.com/maps/api/geocode/json?latlng=$lat,$lng&sensor=false");
$data = json_decode($data);
$add_array  = $data->results;
$add_array = $add_array[0];
$add_array = $add_array->address_components;
$country = "Not found";
$state = "Not found"; 
$city = "Not found";
$street = "Not found";
foreach ($add_array as $key) {
  if($key->types[0] == 'administrative_area_level_2')
  {
    $city = $key->long_name;
  }
  if($key->types[0] == 'administrative_area_level_1')
  {
    $state = $key->long_name;
  }
  if($key->types[0] == 'country')
  {
    $country = $key->long_name;
  }
}
echo "Country : ".$country." ,State : ".$state." ,City : ".$city;
?>
