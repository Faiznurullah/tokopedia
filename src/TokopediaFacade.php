<?php

namespace Faiznurullah\Tokopedia;

use Illuminate\Support\Facades\Facade;


class TokopediaFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'tokopedia';
    }

    
}