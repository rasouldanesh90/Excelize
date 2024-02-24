<?php

namespace Rasouldanesh90\Excelize\Facades;

use Illuminate\Support\Facades\Facade;

class Excelize extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'excelize';
    }
}
