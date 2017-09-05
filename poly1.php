<?php
$deal_lat=13.60845;
$deal_long=100.54164;
$geocode=file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng='.$deal_lat.','.$deal_long.'&sensor=false');

        $output= json_decode($geocode);

    for($j=0;$j<count($output->results[0]->address_components);$j++){
               $cn=array($output->results[0]->address_components[$j]->types[0]);
           if(in_array("country", $cn))
           {
            $country= $output->results[0]->address_components[$j]->long_name;
           }
            }
            echo $country;
?>
