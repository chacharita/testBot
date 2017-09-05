<?php
$str = "a%60gsA_ovdRii%40%7BWcDcBa%40%5Dm%40SoCmAm%40UuCgB";
$str_urldecode = urldecode($str);
var_dump($str_urldecode);
//$string = "a`gsA_ovdRii@{WcDcBa@]m@SoCmAm@UuCgB";
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
//   } while ($char >= 0x20); 

 
//   if ($result & 1)
//     $result = ~$result;
  
//   $result = ($result >> 1) * 0.00001;
//   $results[] = $result;
// } while ($index < count($byte_array));

// for ($i = 2; $i < count($results); $i++) {
//   $results[$i] += $results[$i - 2];
// }


// var_dump(array_chunk($results, 2));

# Test correctness by using Google's polylineutility here:
# https://developers.google.com/maps/documentation/utilities/polylineutility

?>
