<?php

$string = "mfhrAinldR_jnP`|wF}lbCm}nDsznDnm{Biv}C{zrBkfyD~vXv~hDv~lEd_a@ypNxfm@ja@n_]|go@mq`@vvn@hdaAioF`v}@s{Z|{`Asb^hpl@lx`@";
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
  } while ($char >= 0x20); # Step 8 most significant bit in each six bit chunk
      
  if ($result & 1)
  $result = $result;
  $result = ($result >> 1) * 0.00001;
  $results[] = $result;
} while ($index < count($byte_array));


for ($i = 2; $i < count($results); $i++) {
  $results[$i] += $results[$i - 2];
}
var_dump(array_chunk($results,2));
echo "<br>";    
var_dump(array_chunk($results,3));



?>
