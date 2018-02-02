<?php

namespace App\Helpers\Facades\ConnectionFacades;

use Illuminate\Support\Facades\Facade;

class AppliedMethods extends Facade
{
    protected static function getFacadeAccessor(){
        return 'AppliedMethods';
    }
}