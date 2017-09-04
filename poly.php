<?php    

        $string = "a%60gsA_ovdRii%40%7BWcDcBa%40%5Dm%40SoCmAm%40UuCgB";
        $byte_array = array_merge(unpack('C*', $string));

        $index = 0;
        $points = array();
        $lat = 0;
        $lng = 0;
        while ($index < strlen($byte_array)) {
            $b;
            $shift = 0;
            $result = 0;
            do {
                $b = ord(substr($byte_array, $index++, 1)) - 63;
                $result |= ($b & 0x1f) << $shift;
                $shift += 5;
            } while ($b > 31);
            $dlat = (($result & 1) ? ~($result >> 1) : ($result >> 1));
            $lat += $dlat;
            $shift = 0;
            $result = 0;
            do {
                $b = ord(substr($byte_array, $index++, 1)) - 63;
                $result |= ($b & 0x1f) << $shift;
                $shift += 5;
            } while ($b > 31);
            $dlng = (($result & 1) ? ~($result >> 1) : ($result >> 1));
            $lng += $dlng;
            $points[] = array('x' => $lat/100000, 'y' => $lng/100000);
        }
        return $points;
    }
