<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['subscriber_id', 'book_id', 'loan_start', 'loan_end', 'loan_turn_in'];

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    public function subscriber(): BelongsTo
    {
        return $this->belongsTo(Subscriber::class);
    }
}
