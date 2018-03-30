<?php

namespace App\Helpers\Facades\ConnectionFacades;


use Illuminate\Support\Facades\Facade;

class Translit extends Facade{

    protected static function getFacadeAccessor() {
        return 'Translit';
    }
}
