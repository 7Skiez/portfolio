<?php

namespace App\Models\Traits;

trait Featureable
{
    public function scopeFeatured($query)
    {
        return $query->where('featured', 1);
    }

    public function toggleFeature($ids)
    { 
        return $this->whereIn('id', $ids)->update(['featured' => (int)!$this->featured]);
    }
}
