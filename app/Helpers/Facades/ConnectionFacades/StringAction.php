<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18.12.2017
 * Time: 15:32
 */

namespace App\Helpers\Facades\ConnectionFacades;
use Illuminate\Support\Facades\Facade;

class StringAction extends Facade
{
    protected static function getFacadeAccessor(){
        return 'StringAction';
    }
}