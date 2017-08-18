<?php

$string = "ojhsA%7DgjeRgIfZpFjBtEvAlO%60FbC%60AhJdEx%40Vl%40Jr%40Bp%40G%7E%40S%60LyDjHkCrQiGvZqKp%40Uf%40En%40Dd%40LPHh%5CvRvOpJvE%7DDjCoBpMwIpMwGdAg%40xAm%40bEsAvBc%40%7EB_%40nAOh%40Q%7E%40a%40HQt%40y%40%60BwAxIsFfAk%40xCeBnB%7D%40hFaBjAk%40VWBOAYqKmR_CuEmF%7BJeAiBVOj%40bArB%7D%40m%40_B";
$byte_array = array_merge(unpack('C*', $string));
$results = array();

$index = 0; # tracks which char in $byte_array
do {
  $shift = 0;
  $result = 0;
  do {
    $char = $byte_array[$index] - 63; 
    
    
    $result |= ($char & 0x1F) << (5 * $shift);
    $shift++; $index++;
  } while ($char >= 0x20);
      
  if ($result & 1)
  $result = $result;
  $result = ($result >> 1) * 0.00001;
  $results[] = $result;
} while ($index < count($byte_array));


for ($i = 2; $i < count($results); $i++) {
  $results[$i] += $results[$i - 2];
}
var_dump(array_chunk($results,2));




?>
