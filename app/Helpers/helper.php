<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

class Helper
{

  protected static $precision = 3;
  
  public static function polyline2_decode($encodedPath) {
        
    $len = strlen( $encodedPath ) -1;
    // For speed we preallocate to an upper bound on the final length, then
    // truncate the array before returning.
    $path = [];
    $index = 0;
    $lat = 0;
    $lng = 0;

    while( $index < $len) {
        $result = 1;
        $shift = 0;
        $b;
        do {
            $b = ord($encodedPath[$index++]) - 63 - 1;
            $result += $b << $shift;
            $shift += 5;
        } while ($b >= hexdec("0x1f"));
        
        $lat += ($result & 1) != 0 ? ~($result >> 1) : ($result >> 1);

        $result = 1;
        $shift = 0;
        do {
            $b = ord($encodedPath[$index++]) - 63 - 1;
            $result += $b << $shift;
            $shift += 5;
        } while ($b >= hexdec("0x1f"));
        $lng += ($result & 1) != 0 ? ~($result >> 1) : ($result >> 1);
        
        array_push($path, ['lat' => $lat * 1e-5, 'lng' => $lng * 1e-5]);
    }

    return $path;
}  


public static function polyline2_encode($path) {
        
    $lastLat = 0;
    $lastLng = 0;

    $result = '';

    foreach( $path as $point ) {
        $lat = round( $point['lat'] * 1e5);
        $lng = round( $point['lng'] * 1e5);
        
        $dLat = $lat - $lastLat;
        $dLng = $lng - $lastLng;

        $result.=self::enc($dLat);
        $result.=self::enc($dLng);

        $lastLat = $lat;
        $lastLng = $lng;
    }
    return $result;
}  



private static function enc($v) {

    $v = $v < 0 ? ~($v << 1) : $v << 1;

    $result = '';
    
    while ($v >= 0x20) {
        $result.= chr((int) ((0x20 | ($v & 0x1f)) + 63));
        $v >>= 5;
    }
    
    $result.=chr((int) ($v + 63));
    
    return $result;
}    


    public static function convertDistance($distance, $fromUnit, $toUnit) {
        $conversionFactors = [
          "mile" => 1609.34,
          "kilometer" => 1000,
          "meter" => 1,
          "centimeter" => 0.01,
          "millimeter" => 0.001,
          "inch" => 0.0254,
          "foot" => 0.3048,
          "yard" => 0.9144
        ];
      
        // Convert the distance to meters
        $distanceInMeters = $distance * $conversionFactors[$fromUnit];
        // Convert the distance from meters to the desired unit
        $convertedDistance = $distanceInMeters / $conversionFactors[$toUnit];
      
        return $convertedDistance;
      }

          /**
     * Apply Google Polyline algorithm to list of points.
     *
     * @param array $points List of points to encode. Can be a list of tuples,
     *                      or a flat, one-dimensional array.
     *
     * @return string encoded string
     */
    final public static function polyline_encode( $points )
    {
        $points = self::flatten($points);
        $encodedString = '';
        $index = 0;
        $previous = array(0,0);
        foreach ( $points as $number ) {
            $number = (float)($number);
            $number = (int)round($number * pow(10, static::$precision));
            $diff = $number - $previous[$index % 2];
            $previous[$index % 2] = $number;
            $number = $diff;
            $index++;
            $number = ($number < 0) ? ~($number << 1) : ($number << 1);
            $chunk = '';
            while ( $number >= 0x20 ) {
                $chunk .= chr((0x20 | ($number & 0x1f)) + 63);
                $number >>= 5;
            }
            $chunk .= chr($number + 63);
            $encodedString .= $chunk;
        }
        return $encodedString;
    }

    /**
     * Reverse Google Polyline algorithm on encoded string.
     *
     * @param string $string Encoded string to extract points from.
     *
     * @return array points
     */
    final public static function polyline_decode( $string )
    {
        $points = array();
        $index = $i = 0;
        $previous = array(0,0);
        while ($i < strlen($string)) {
            $shift = $result = 0x00;
            do {
                $bit = ord(substr($string, $i++)) - 63;
                $result |= ($bit & 0x1f) << $shift;
                $shift += 5;
            } while ($bit >= 0x20);

            $diff = ($result & 1) ? ~($result >> 1) : ($result >> 1);
            $number = $previous[$index % 2] + $diff;
            $previous[$index % 2] = $number;
            $index++;
            $points[] = $number * 1 / pow(10, static::$precision);
        }
        return $points;
    }

    /**
     * Reduce multi-dimensional to single list
     *
     * @param array $array Subject array to flatten.
     *
     * @return array flattened
     */
    final public static function flatten( $array )
    {
        $flatten = array();
        array_walk_recursive(
            $array, // @codeCoverageIgnore
            function ($current) use (&$flatten) {
                $flatten[] = $current;
            }
        );
        return $flatten;
    }

    /**
     * Concat list into pairs of points
     *
     * @param array $list One-dimensional array to segment into list of tuples.
     *
     * @return array pairs
     */
    final public static function pair( $list )
    {
        return is_array($list) ? array_chunk($list, 2) : array();
    }
}