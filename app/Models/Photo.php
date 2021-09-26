<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'file', 'place_id'];

    public function place()
    {
        return $this->belongsTo(Place::class);
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
