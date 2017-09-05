<?php


// $string = "qvmrAqzndRcgE_]wlCw_C}pCkfDusBquEvwEuoH";
// $byte_array = array_merge(unpack('C*', $string));
// $results = array();

// $index = 0;
// do {
//   $shift = 0;
//   $result = 0;
//   do {
//     $char = $byte_array[$index] - 63; 
    
//     $result |= ($char & 0x1F) << (5 * $shift);
//     $shift++; $index++;
//   } 
//   while ($char >= 0x20); 
    
  
//   if ($result & 1)
//     $result = $result;
  
//   $result = ($result >> 1) * 0.00001;
//   $results[] = $result;
// } while ($index < count($byte_array));

// for ($i = 2; $i < count($results); $i++) {
//   $results[$i] += $results[$i - 2];
// }

//   //var_dump(array_chunk($results, 2));
//   searchLocations((array_chunk($results, 2)));
  
// }


// function searchLocations($results=null) {
//          $address = document.getElementById("addressInput").value;
//          $geocoder = new google.maps.Geocoder();
//          $a = geocoder.geocode({address: address}, function(results, status) {
//            if (status == google.maps.GeocoderStatus.OK) {
//             searchLocationsNear(results[0].geometry.location);
//            } else {
//              alert(address + ' not found');
//            }
//          });
//        }
$encoded = "qvmrAqzndRcgE_]wlCw_C}pCkfDusBquEvwEuoH";

$points = Polyline::decode($encoded);
//=> array(
//     41.90374,-87.66729,41.90324,-87.66728,
//     41.90324,-87.66764,41.90214,-87.66762
//   );

// Or list of tuples
$points = Polyline::pair($points);

var_dump($points);

?>
