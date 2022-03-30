<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Project extends Model
{
    use HasFactory;

    public static function hasOwner() {return true;}
    public static function hasOrder() {return true;}

    public static function setActive($id) {
        self::where('id', '!=', $id)->where('owner_id', '=', auth()->user()->id)->where('active', '=', 1)->update(['active' => 0]);
    }

}
