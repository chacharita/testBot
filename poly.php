<?php
<html>
<form>
<input type="hidden" name="mapLat">
<input type="hidden" name="mapLong">
<input type="text" name="location">
<input type="submit" name="submit" value="submit">



extact($_POST);
if($mapLat =='' && $mapLong ==''){
        // Get lat long from google
        $latlong    =   get_lat_long($location); // create a function with the name "get_lat_long" given as below
        $map        =   explode(',' ,$latlong);
        $mapLat         =   $map[0];
        $mapLong    =   $map[1];    
}


// function to get  the address
function get_lat_long($address){

    $address = str_replace(" ", "+", $address);

    $json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=$region");
    $json = json_decode($json);

    $lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
    $long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
    return $lat.','.$long;
}
</form>
</html>

?>
