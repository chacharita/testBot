<!-- <?php
 
// /**
//  * Issue #10
//  * Wrong rounding method for google.
//  * @link https://github.com/emcconville/google-map-polyline-encoding-tool/issues/10
//  */
// class Issue10 extends PHPUnit_Framework_TestCase
// {
//     public function testRounding()
//     {
//         $originalPoints = array(48.000006, 2.000004, 48.00001, 2.0);
//         $encoded = Polyline::Encode($originalPoints);
//         $this->assertEquals('a%60gsA_ovdRii%40%7BWcDcBa%40%5Dm%40SoCmAm%40UuCgB', $encoded);
//         $decodedPoints = Polyline::Decode($encoded);
//         $this->assertTrue($decodedPoints[0] === $decodedPoints[2]);
//         $this->assertTrue($decodedPoints[1] === $decodedPoints[3]);
//     }
} -->
 <?php

class CorruptedPathException extends Exception {
}


/*
 * Decode polyline coordinates encoded according to https://developers.google.com/maps/documentation/utilities/polylinealgorithm
 * @param string $encoded encoded polyline
 *
 * @return array polyline coordinates
 */
function decodePolyline($encoded) {
    // Result
    $polyline = array() ;
    // Current index in string
    $string_index = 0 ;
    // String length
    $string_length = strlen($encoded) ;
    // Current latitude and longitude
    $lat = $lng = 0 ;
    // Read characters
    while ($string_index < $string_length) {
        // Delta in latitude
        $dlat = (int) 0 ;
        // Binary shift
        $shift = 0 ;
        do {
            // Check consistency
            if ($string_index < 0 || $string_index >= $string_length) {
                throw new CorruptedPathException("Failed to decode path") ;
            }
            // Compute orignal binary value
            $c = (int) (ord($encoded[$string_index]) - 63) ;
            // Compose binary delta in latitude
            $dlat |= ($c & 0x1F) << $shift ;
            $shift += 5 ;
            $string_index++ ;
        } while ($c >= 0x20) ;
        // Compute new latitude value
        $lat += ($dlat & 1) ? ~($dlat >> 1) : ($dlat >> 1) ;

        // Delta in longitude
        $dlng = (int) 0 ;
        // Binary shift
        $shift = 0 ;
        do {
            // Check consistency
            if ($string_index < 0 || $string_index >= $string_length) {
                throw new CorruptedPathException("Failed to decode path") ;
            }
            // Compute orignal binary value
            $c = (int) (ord($encoded[$string_index]) - 63) ;
            // Compose binary delta in longitude
            $dlng |= ($c & 0x1F) << $shift ;
            $shift += 5 ;
            $string_index++ ;
        } while ($c >= 0x20) ;
        // Compute new longitude value
        $lng += ($dlng & 1) ? ~($dlng >> 1) : ($dlng >> 1) ;

        // Add the new point in result array
        $polyline[] = array('lat' => $lat / 100000., 'lng' => $lng / 100000.) ;
    }

    // Return result
    return $polyline ;
}
?>
