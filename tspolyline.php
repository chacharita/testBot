<?php

$string = "a%60gsA_ovdRii%40%7BWcDcBa%40%5Dm%40SoCmAm%40U%5BUmFyC_BcA%7BGeDcDcBeEsB%7BHqDuDoBeKcFyKsFwSaK%5D%5BcSwJeEcBwY%7BNwJuEwFsCkB%7B%40qDgBuKsFaB_AoDcBcWcM%7BwBefAiE%7BBkD_B_N%7BGeAk%40SAwJ%7BEoCqAs%40QYEi%40Em%40%40m%40G%7B%40U%5DU_%40a%40W_%40Si%40GY%40a%40DSR%5DPM%5CMVEbABr%40Tx%40b%40ZH%5E%40%60Ce%40RGv%40e%40%5C%5DLObAkBjR_c%40wB_AGEQWXa_%40gCea%40c%40gGI%3FuD%7BB%7DUuM";
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
