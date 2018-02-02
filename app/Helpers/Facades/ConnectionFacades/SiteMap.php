<?php

namespace App\Helpers\Facades\ConnectionFacades;

use Illuminate\Support\Facades\Facade;

class SiteMap extends Facade
{
    protected static function getFacadeAccessor(){
        return 'SiteMap';
    }
}