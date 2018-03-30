<?php

namespace App\Helpers\Facades\ConnectionFacades;

use Illuminate\Support\Facades\Facade;

class FileAction extends Facade
{
    protected static function getFacadeAccessor(){
        return 'FileAction';
    }
}