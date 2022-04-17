<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\Auth;

trait HasOwner
{
    public function save(array $options = [])
    {
        // If no owner has been assigned, assign the current user's id as the owner
        if (!$this->owner_id && Auth::user()) {
            $this->owner_id = Auth::user()->getKey();
        }

        $this->order = $this->max('order') + 1;

        return parent::save();
    }
}
