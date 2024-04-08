<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function countries(): BelongsToMany
    {
        return $this->belongsToMany(Country::class);
    }

    public function diets(): BelongsToMany
    {
        return $this->belongsToMany(Diet::class);
    }

    public function aquarium(): HasOne
    {
        return  $this->hasOne(Aquarium::class, 'fish_id');
    }
}
