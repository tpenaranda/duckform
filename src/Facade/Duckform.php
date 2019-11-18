<?php

namespace TPenaranda\Duckform\Facade;

use Illuminate\Support\Facades\Facade;

class Duckform extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'tpenaranda-duckform';
    }
}
