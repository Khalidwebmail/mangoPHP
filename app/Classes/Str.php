<?php


namespace App\Classes;


class Str
{
    /**
     * @param $param
     * @return string
     */
    public static function slug( $param )
    {
        $slugify = new Slugify();
        return $slugify->slugify( $param );
    }
}