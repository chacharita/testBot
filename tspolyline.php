<?php

$string = "a%60gsA_ovdRgRkJgOoH%7DJcFk%40G%5DIi%40Ec%40%40oAN%5DAe%40G%7B%40Ye%40G%7DFHg%40%40m%40XQVAL%40TJRtS%7CHtIhDpe%40zUd%40Pp%40Pd%40Dr%40BEbC";
$byte_array = array_merge(unpack('C*', $string));
$results = array();

$index = 0; # tracks which char in $byte_array
do {
  $shift = 0;
  $result = 0;
  do {
    $char = $byte_array[$index] - 63; # Step 10
    
    $result |= ($char & 0x1F) << (5 * $shift);
    $shift++; $index++;
  } while ($char >= 0x20); # Step 8 most significant bit in each six bit chunk
    
  
  if ($result & 1)
    $result = ~$result;
  
  $result = ($result >> 1) * 0.00001;
  $results[] = $result;
} while ($index < count($byte_array));

for ($i = 2; $i < count($results); $i++) {
  $results[$i] += $results[$i - 2];
}


var_dump(array_chunk($results, 2));


?>
