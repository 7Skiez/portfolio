<?php

namespace App\Models;

class MenuItem extends \TCG\Voyager\Models\MenuItem
{

    public function children()
    {
        return $this->hasMany(MenuItem::class, 'parent_id')
            ->with('children');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}