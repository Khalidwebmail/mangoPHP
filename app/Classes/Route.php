<?php


namespace App\Classes;

/**
 * Class Route
 * @package App\Classes
 */
class Route
{
    /**
     * @var bool
     * Return requested route match or not
     */
    private static $no_match = true;

    /**
     * Get requested url info
     * @return array
     */
    private static function getUrl() {
        return $_SERVER[ 'REQUEST_URI' ];
    }

    /**
     * Process requested url
     * @param $pattern
     * @param $callback
     *
     */
    private static function processUrl( $pattern, $callback ) {
        $args = [];
        $pattern = "~^/?{$pattern}/?$~";
        $params = self::getMatch( $pattern );

        if( $params ) {
            if( is_callable( $callback ) ) {
                $args = array_slice( $params, 1 );
                self::$no_match = false;

                if( is_array( $callback ) ) {
                    $class_name  = $callback[0];
                    $method_name = $callback[1];
                    $object = $class_name::getInstance();
                    $object->$method_name( ...$args );
                }
                else{
                    $callback( ...$args );
                }
            }
            else{
                self::$no_match = false;
                $parts = explode('@', $callback);
                if( $parts ){
                    $class_name  = $parts[0];
                    $method_name = $parts[1];
                    $object = $class_name::getInstance();
                    $object->$method_name( ...$args );
                }
            }
        }
    }

    /**
     * Matching requested url
     * @param $pattern
     * @return false|true
     */
    private static function getMatch( $pattern ) {
        $url = self::getUrl();
        if( preg_match( $pattern, $url, $match)) {
            return $match;
        }
        return false;
    }

    /**
     * Handle get request route
     * @param $pattern
     * @param $callback
     */
    public static function get( $pattern, $callback ) {
        if( 'GET' !== $_SERVER[ 'REQUEST_METHOD' ] ) {
            return;
        }
        self::processUrl( $pattern, $callback );
    }

    /**
     * Handle post request route
     * @param $pattern
     * @param $callback
     */
    public static function post( $pattern, $callback ) {
        if( 'POST' !== $_SERVER[ 'REQUEST_METHOD' ] ) {
            return;
        }
        self::processUrl( $pattern, $callback );
    }

    /**
     * Handle delete request route
     * @param $pattern
     * @param $callback
     */
    public static function delete( $pattern, $callback ) {
        if( 'DELETE' !== $_SERVER[ 'REQUEST_METHOD' ] ) {
            return;
        }
        self::processUrl( $pattern, $callback );
    }

    /**
     * If no route matches
     */
    public static function cleanup() {
        if( self::$no_match ) {
            echo "No routes found";
        }
    }
}