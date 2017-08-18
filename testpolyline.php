<?php

# Do steps 1-11 given here 
# https://developers.google.com/maps/documentation/utilities/polylinealgorithm
# in reverse order and inverted (i.e. left shift -> right shift, add -> subtract)

$string = "ojhsA%7DgjeRgIfZpFjBtEvAlO%60FbC%60AhJdEx%40Vl%40Jr%40Bp%40G%7E%40S%60LyDjHkCrQiGvZqKp%40Uf%40En%40Dd%40LPHh%5CvRvOpJvE%7DDjCoBpMwIpMwGdAg%40xAm%40bEsAvBc%40%7EB_%40nAOh%40Q%7E%40a%40HQt%40y%40%60BwAxIsFfAk%40xCeBnB%7D%40hFaBjAk%40VWBOAYqKmR_CuEmF%7BJeAiBVOj%40bArB%7D%40m%40_B";
# Step 11) unpack the string as unsigned char 'C'
$byte_array = array_merge(unpack('C*', $string));
$results = array();

$index = 0; # tracks which char in $byte_array
do {
  $shift = 0;
  $result = 0;
  do {
    $char = $byte_array[$index] - 63; # Step 10
    # Steps 9-5
    # get the least significat 5 bits from the byte
    # and bitwise-or it into the result
    $result |= ($char & 0x1F) << (5 * $shift);
    $shift++; $index++;
  } while ($char >= 0x20); # Step 8 most significant bit in each six bit chunk
    # is set to 1 if there is a chunk after it and zero if it's the last one
    # so if char is less than 0x20 (0b100000), then it is the last chunk in that num

  # Step 3-5) sign will be stored in least significant bit, if it's one, then 
  # the original value was negated per step 5, so negate again
  if ($result & 1)
    $result = ~$result;
  # Step 4-1) shift off the sign bit by right-shifting and multiply by 1E-5
  $result = ($result >> 1) * 0.00001;
  $results[] = $result;
} while ($index < count($byte_array));

# to save space, lat/lons are deltas from the one that preceded them, so we need to 
# adjust all the lat/lon pairs after the first pair
for ($i = 2; $i < count($results); $i++) {
  $results[$i] += $results[$i - 2];
}

# chunk the array into pairs of lat/lon values
var_dump(array_chunk($results, 2));

# Test correctness by using Google's polylineutility here:
# https://developers.google.com/maps/documentation/utilities/polylineutility

?>
