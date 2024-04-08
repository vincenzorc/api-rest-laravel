<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Aquarium extends Model
{
    use HasFactory;

    protected $table = "aquaria";

    protected $fillable = [
        'fish_id',
        'temperature',
        'ph_min',
        'ph_max',
        'gh_min',
        'gh_max',
        'capacity'
    ];

    public function fish(): BelongsTo
    {
        return $this->belongsTo(Fish::class);
    }
}
