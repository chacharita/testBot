<?php

$string = "s%7ChsA%7DrwdRsBgA_BcA%7BAu%40JQzAv%40%7CChBxAp%40%5EJlATb%40NVNxACh%40IRDHLBLBv%40Hb%40HRd%40%60%40jGnCtB%60A%7ENpHxLbGfHdDbPfIzAp%40lCtAh%40TtBv%40NPf%40%60%40BJIFq%40IoAe%40oPcI%7DLiG";
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
