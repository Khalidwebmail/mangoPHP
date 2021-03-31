<?php


namespace App\Controllers;


class BaseController
{
    private static $instance;

    public static function getInstance() {
        if( ! self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public static function showPrice() {
        echo '<h2>Price is 10 TK</h2>';
    }
}