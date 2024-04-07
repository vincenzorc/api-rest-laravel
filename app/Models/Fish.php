<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fish extends Model
{
    use HasFactory;

    protected $fillable = [
        'family_id',
        'gender_id',
        'name',
        'scientific_name',
        'size',
        'longevity',
        'description',
        'temper',
        'photo'
    ];

    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }

    public function family(): BelongsTo
    {
        return $this->belongsTo(Family::class);
    }
}
