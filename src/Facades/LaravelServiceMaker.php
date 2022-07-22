<?php

namespace NordCoders\LaravelServiceMaker\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \NordCoders\LaravelServiceMaker\LaravelServiceMaker
 */
class LaravelServiceMaker extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-service-maker';
    }
}
