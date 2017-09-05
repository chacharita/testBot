<?php


$string = "s|hsA}rwdRsBgA_BcA{Au@JQzAv@|ChBxAp@^JlATb@NVNxACh@IRDHLBLBv@Hb@HRd@`@jGnCtB`A~NpHxLbGfHdDbPfIzAp@lCtAh@TtBv@NPf@`@BJIFq@IoAe@oPcI}LiG";
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
  } 
  while ($char >= 0x20); 
    
  
  if ($result & 1)
    $result = $result;
  
  $result = ($result >> 1) * 0.00001;
  $results[] = $result;
} while ($index < count($byte_array));

for ($i = 2; $i < count($results); $i++) {
  $results[$i] += $results[$i - 2];
}

  var_dump(array_chunk($results, 2));
  //searchLocations((array_chunk($results, 2)));
  
}

?>
