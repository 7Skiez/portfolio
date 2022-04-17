<?php

namespace App\Models;

use App\Models\Traits\Featureable;
use App\Models\Traits\HasOwner;
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

    use HasFactory, Featureable, HasOwner;

    public function scopeCurrentUser($query)
    {
        return $query->where('owner_id', Auth::user()->id);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}