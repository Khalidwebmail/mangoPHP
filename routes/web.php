<?php

use App\Classes\Route;

//Route::get('/', function () {
//    return view
//});
Route::get('/', [\App\Controllers\BaseController::class, 'index']);
Route::get('hello/man', function () {
    echo "Welcome man";
});

Route::get('greet/(\w+)', function( $name ) {
    echo 'Welcome '.$name;
});

Route::get('greet/(\w+)/title/(\w+)', function( $name, $title ) {
    echo 'Welcome '.' '.$title.' '.$name;
});

Route::cleanup();