<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    public function set()
    {
        return $this->belongsTo(Set::class);
    }
}
