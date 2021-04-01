<?php


namespace App\Classes;


class Session
{
    /**
     * Set value to session
     * @param $name
     * @param $value
     * @throws \Exception
     */
    public static function set( $name, $value )
    {
        if( $name != '' && ! empty( $name ) && $value != '' && ! empty( $value ) ){
            $_SESSION[ $name ] = $value;
        }

//        throw new \Exception('Name and value required');
    }

    /**
     * Get value from session
     * @param $name
     * @return mixed
     */
    public static function get( $name )
    {
        if( isset( $name ) ) {
            return $_SESSION[ $name ];
        }
    }

    /**
     * Check is session exists
     * @param $name
     * @return bool
     * @throws \Exception
     */
    public static function has( $name )
    {
        if( $name != '' && !empty( $name ) ){
            return ( isset ( $_SESSION[$name ] ) ) ? true : false;
        }

        throw new \Exception('Name is required');
    }

    /**
     * Remove value session
     * @param $name
     */
    public static function remove( $name )
    {
        if( self::has( $name ) ){
            unset( $_SESSION[ $name ] );
        }
    }
}