<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function features(): HasMany
    {
        return $this->hasMany(Feature::class);
    }

    public function price(): Attribute
    {
        return Attribute::make(
            set: fn($value) => $value * 100,
            get: fn($value) => $value / 100,
        );
    }
}
