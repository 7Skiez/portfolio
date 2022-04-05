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

    public function items()
    {
        return $this->hasMany(MenuItem::class);
    }

    public function parent_items()
    {
        return $this->hasMany(MenuItem::class)
            ->whereNull('parent_id');
    }
}
