<?php


namespace App\Classes;


class CsrfToken
{
    /**
     * Generate Token
     * @return string
     */
    public static function token() {
        if( ! Session::has('_token' ) ){
            $random_token = base64_encode( openssl_random_pseudo_bytes(32 ) );
            Session::set( '_token', $random_token );
        }
        return Session::get( '_token' );
    }

    /**
     * Verify CSRF TOKEN
     * @param $request_token
     * @return bool
     */
    public static function verifyToken( $request_token )
    {
        if( Session::has('_token') && Session::get( '_token' ) === $request_token ){
            Session::remove('_token' );
            return true;
        }
        return false;
    }
}