<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;

/**
 * @todo: Refactor this class by using something like MenuBuilder Helper.
 */
class Menu extends \TCG\Voyager\Models\Menu
{
    public function scopeCurrentUser($query)
    {
        if (!Auth::user()->hasRole('admin'))
            return $query->where('name', Auth::user()->username);
    }
}
