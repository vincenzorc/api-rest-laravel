<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Family extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    //protected $hidden = [];

    public function fish(): HasMany
    {
        return $this->hasMany(Fish::class);
    }
}
