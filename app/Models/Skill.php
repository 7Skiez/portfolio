<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Skill extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['featured'];

    use HasFactory;

    public function scopeCurrentUser($query)
    {
        return $query->where('owner_id', Auth::user()->id);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function toggleFeature($ids)
    { 
        return $this->whereIn('id', $ids)->update(['featured' => (int)!$this->featured]);
    }

    public function save(array $options = [])
    {
        // If no owner has been assigned, assign the current user's id as the owner of the workstation
        if (!$this->owner_id && Auth::user()) {
            $this->owner_id = Auth::user()->getKey();
        }

        $this->order = $this->max('order') + 1;

        return parent::save();
    }
}