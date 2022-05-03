<?php

namespace App\Models;

use App\Traits\HasSections;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends \TCG\Voyager\Models\User
{
    use HasApiTokens, HasFactory, Notifiable, HasSections;

    protected $guarded = [
        'username'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function certifications()
    {
        return $this->hasMany(Certification::class, 'owner_id');
    }

    public function mediums()
    {
        return $this->hasMany(Medium::class, 'owner_id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'owner_id');
    }

    public function skills()
    {
        return $this->hasMany(Skill::class, 'owner_id');
    }

    public function tools()
    {
        return $this->hasMany(Tool::class, 'owner_id');
    }
}
