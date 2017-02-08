<?php

namespace Imam\Bisa;

use Illuminate\Support\Facades\Facade;

class BisaFacade extends Facade{

    protected static function getFacadeAccessor()
    {
        return 'bisa';
    }
}