<?php

namespace Scarletspruce\Turbosms\Facades;

/**
 * Class Facade
 * @package Scarletspruce\Turbosms
 */

use Illuminate\Support\Facades\Facade;

class Turbosms extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'turbo_sms';
    }
}