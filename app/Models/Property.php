<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    public function location()
    {
        $this->belongsTo(Location::class, 'location_id');
    }

    public function gallery()
    {
       return $this->hasMany(Media::class, 'property_id');
    }
}
