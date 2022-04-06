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

    public function toggleFeature($id)
    { 
        return $this->find($id)->update(['featured' => (int)!$this->featured]);
    }
}