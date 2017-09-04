<?php

$string = "mhhsAk%7DydRfGg%40DGA_ADGfB%5D%60BOFE%40E%40UBApE%3FNAzDeIEe%40EIOIq%40GkV%5Dm%40KcAC_j%40_A%7BDB%7DE%5EoANsCh%40iCp%40aBj%40%7BAn%40aCpA_CtAy%40n%40%7DApA%7B%40z%40mAxASh%40_ApAm%40hAyD%7EIMBI%3FGCEKrDiJh%40aAXYR%5Dz%40kAhByB%5E_%40%60ByA%7E%40s%40t%40e%40nGeDj%40Wp%40Sm%40%7BBGEm%40F";
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
