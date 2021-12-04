<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Book extends Model
{
    use HasFactory;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function keyword(): HasMany
    {
        return $this->hasMany(Keyword::class);
    }

    public function language(): HasOne
    {
        return $this->hasOne(Language::class);
    }

    public function loan(): HasOne
    {
        return $this->hasOne(Loan::class);
    }
}
