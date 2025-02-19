<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        "api_id",
        "set_id",
        "name",
        "version",
        "number",
        "card_identifier",
        "image",
        "thumbnail",
        "description",
        "rarity",
        "story",
    ];

    public function set()
    {
        return $this->belongsTo(Set::class);
    }
}
