<?php
/* 
	Get Country, State & City from Google's Geocoding API
	http://www.beliefmedia.com/reverse-geocoding-google-maps
*/
 
 
function beliefmedia_reverse_geocode($address) {
 
	$address = str_replace(" ", "+", "$address");
	$url = "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false";
	$result = file_get_contents("$url");
	$json = json_decode($result);
 
	foreach ($json->results as $result) {
		foreach($result->address_components as $addressPart) {
		  if ((in_array('locality', $addressPart->types)) && (in_array('political', $addressPart->types)))
		  $city = $addressPart->long_name;
	    	else if ((in_array('administrative_area_level_1', $addressPart->types)) && (in_array('political', $addressPart->types)))
		  $state = $addressPart->long_name;
	    	else if ((in_array('country', $addressPart->types)) && (in_array('political', $addressPart->types)))
		  $country = $addressPart->long_name;
		}
	}
	
   if(($city != '') && ($state != '') && ($country != '')) 
      $address = $city.', '.$state.', '.$country;
   else if (($city != '') && ($state != ''))
      $address = $city.', '.$state;
   else if (($state != '') && ($country != ''))
      $address = $state.', '.$country;
   else if ($country != '')
      $address = $country;
		
 return $address;
}
 
 
/* Usage */
echo beliefmedia_reverse_geocode("19-29 Martin Pl, Sydney");
?>
