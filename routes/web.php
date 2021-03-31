<?php

use App\Classes\Route;

Route::get('/', function () {
    echo "Welcome home";
});

Route::get('hello/man', function () {
    echo "Welcome man";
});

Route::get('greet/(\w+)', function( $name ) {
    echo 'Welcome '.$name;
});

Route::get('greet/(\w+)/title/(\w+)', function( $name, $title ) {
    echo 'Welcome '.' '.$title.' '.$name;
});

Route::get('price', [\App\Controllers\BaseController::class, 'showPrice']);
Route::get('price2', '\App\Controllers\BaseController@showPrice');
Route::cleanup();