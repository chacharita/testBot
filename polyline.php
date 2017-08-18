<?php

$string = "ulisAkn%7BdRMC%7BGJa%40sGu%40aPYgFMiB_%40yHm%40%7BKB_%40H_%40Bg%40%5BaIBYqN%5BuA%3FqKQaHQs%40%3FQB%7DCBmHEwE%3FkBCKEa%40AaC%40oIE%7DKs%40_%40Io%40_%40sDsCiAu%40w%40_%40uBo%40mP%7BDuA%5BiAEyCAqCU%5DGi%40O%5BOQQg%40s%40mJmRa%40aAyAqEvE%7DA%5ESLOHOBUv%40k%40";
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
  } while ($char >= 0x30);
      
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
