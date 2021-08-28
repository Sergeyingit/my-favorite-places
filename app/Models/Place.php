<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    public function tape()
    {
        return $this->hasOne(Type::class);
    }

    public function photo()
    {
        return $this->hasMany(Photo::class);
    }
}
