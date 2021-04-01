<?php


namespace App\Controllers;


use App\Classes\Session;

class BaseController
{
    private static $instance;

    public static function getInstance() {

        if( ! self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function index() {
        return view('welcome');
    }
}