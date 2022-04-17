<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Portfolio extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @method static string image($file, $default = '')
     * @method static $this useModel($name, $object)
     *
     * @see \TCG\Voyager\Voyager
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'portfolio';
    }
}
