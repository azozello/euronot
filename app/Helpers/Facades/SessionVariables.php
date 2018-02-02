<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 17.12.2017
 * Time: 21:30
 */

namespace App\Helpers\Facades;


class SessionVariables
{
    public static function set_session_variable($var_name,$var_value){
        session_start();
        unset($_SESSION[$var_name]);
        $_SESSION[$var_name] = $var_value;
    }
}