<?php

namespace App\Helpers\Facades\ConnectionFacades;


use Illuminate\Support\Facades\Facade;

class SessionVariables extends Facade
{
     protected static function getFacadeAccessor(){
         return 'SessionVariables';
     }
}