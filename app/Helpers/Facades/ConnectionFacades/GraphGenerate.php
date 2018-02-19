<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 05.02.2018
 * Time: 19:45
 */

namespace App\Helpers\Facades\ConnectionFacades;
use Illuminate\Support\Facades\Facade;

class GraphGenerate extends Facade
{
    protected static function getFacadeAccessor(){
        return 'GraphGenerate';
    }
}