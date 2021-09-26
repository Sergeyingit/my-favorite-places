<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type_id'];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function photo()
    {
        return $this->hasMany(Photo::class);
    }

    public function ratings()
    {
        return $this->morphMany(Rating::class, 'ratingtable');
    }

    public function getRating()
    {
        return $this->ratings()->where('type',true)->count() - $this->ratings()->where('type', false)->count();
    }
}
