<?php

namespace Bisa;

use Illuminate\Support\Facades\Facade;

class RoleFacade extends Facade{

    protected static function getFacadeAccessor()
    {
        return 'bisa_role';
    }
}