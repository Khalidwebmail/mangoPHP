<?php


namespace App\Controllers;


class BaseController
{
    private static $instance;

    public function __construct() {
        self::getInstance();
    }

    protected static function getInstance() {

        if( ! self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
    }
}