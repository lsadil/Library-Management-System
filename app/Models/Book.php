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

    public function loan(): HasOne
    {
        return $this->hasOne(Loan::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['title'] ?? false, fn($query, $search) => $query
            ->where('title', 'like', '%' . $search . '%')
        );

        $query->when($filters['author'] ?? false, fn($query, $search) => $query
            ->where('author', 'like', '%' . $search . '%')
        );

        $query->when($filters['ISBN'] ?? false, fn($query, $search) => $query
            ->where('ISBN', 'like', '%' . $search . '%')
        );

        $query->when($filters['category'] ?? false, fn($query, $search) => $query->whereHas('category', fn($query) => $query->where('name', $search)));

        $query->when($filters['language'] ?? false, fn($query, $search) => $query
            ->where('language', 'like', '%' . $search . '%')
        );

        $query->when($filters['year'] ?? false, fn($query, $search) => $query
            ->where('year', 'like', '%' . $search . '%')
        );
    }
}
