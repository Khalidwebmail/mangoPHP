<?php


namespace App\Classes;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class Database
{
    private $capsule;

    public function __construct()
    {
        $this->capsule = new Capsule();

        $this->connection();
        $this->boot();
    }

    /**
     * Database connection
     */
    private function connection()
    {
        $this->capsule->addConnection([
            'driver'    => getenv('DB_DRIVER'),
            'host'      => getenv('DB_HOST'),
            'database'  => getenv('DB_NAME'),
            'username'  => getenv('DB_USERNAME'),
            'password'  => getenv('DB_PASSWORD'),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);
    }

    /**
     * Boot method for database
     */
    private function boot()
    {
        $this->capsule->bootEloquent();
        $this->capsule->setAsGlobal();
    }
}