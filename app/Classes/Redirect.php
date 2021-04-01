<?php


namespace App\Classes;


class Redirect
{
    /**
     * Redirect another page
     * @param $page
     */
    public static function to( $page )
    {
        header("location: $page" );
    }

    /**
     * Redirect same page
     */
    public static function back()
    {
        $uri = $_SERVER[ 'REQUEST_URI' ];
        header("location: $uri" );
    }
}