<?php

namespace App\Models;

use App\Models\Traits\Featureable;
use App\Models\Traits\HasOwner;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Project extends Model
{
    use HasFactory, Featureable, HasOwner;
    
    protected $fillable = [
        'active',
        'featured',
    ];

    public function scopeCurrentUser($query)
    {
        return $query->where('owner_id', Auth::user()->id);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
    
    public function setActive($id) {
        return $this->whereBelongsTo(auth()->user())->where('id', '!=', $id)->where('active', '=', 1)->update(['active' => 0]);
    }

}
