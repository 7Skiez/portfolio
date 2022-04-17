<?php

namespace App\Models;

use App\Models\Traits\Featureable;
use Illuminate\Support\Facades\Auth;

/**
 * @todo: Refactor this class by using something like MenuBuilder Helper.
 */
class MenuItem extends \TCG\Voyager\Models\MenuItem
{
    use Featureable;
}
