<?php

use Philo\Blade\Blade;

/**
 * Use to load view
 * @param $path
 * @param array $data
 */
function view( $path, array $data = [] ) {
    $view  = __DIR__ . '/../resources/views/';
    $cache = __DIR__ . '/../bootstrap/cache/';

    $blade = new Blade( $view, $cache );

    echo $blade->view()->make( $path, $data )->render();
}