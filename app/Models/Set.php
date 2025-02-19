<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    use HasFactory;

    protected $fillable = [
        "api_id",
        "name",
        "code",
        "release_date",
        "card_number",
    ];

    public function cards()
    {
        return $this->hasMany(Card::class);
    }
}
