<?php
$str = "od}rAwaodR^mCNY~A?@cAHi@iBQ_@Gd@qBYIeDk@PyA@OE}@KCCC{QoFi@G[n@YMd@{@\eAmByAu@}@qAwCi@_BKy@KiAI]KYOQg@[k@UgDgAWYsBk@qFgBog@kO}KqDaAW_EmAs@UmGiCyCaAkXaI}E_BwHyB{m@cRmTqGmEmAmAGoB[iDc@kAKwBIeABa@Hi@Tq@d@o@V]?WKs@i@][i@u@O_@WaAK{AHyBdAaTa@y`@IwEKm@ISKO[SsS{J}LiG";
$str_urldecode = urldecode($str);
var_dump($str_urldecode);
$string = $str_urldecode;
$byte_array = array_merge(unpack('C*', $string));
$results = array();

$index = 0; 
do {
  $shift = 0;
  $result = 0;
  do {
    $char = $byte_array[$index] - 63; 
   
    $result |= ($char & 0x1F) << (5 * $shift);
    $shift++; $index++;
  } while ($char >= 0x20); 

 
  if ($result & 1)
    $result = ~$result;
  
  $result = ($result >> 1) * 0.00001;
  $results[] = $result;
} while ($index < count($byte_array));

for ($i = 2; $i < count($results); $i++) {
  $results[$i] += $results[$i - 2];
}


var_dump(array_chunk($results, 2));

# Test correctness by using Google's polylineutility here:
# https://developers.google.com/maps/documentation/utilities/polylineutility

?>
