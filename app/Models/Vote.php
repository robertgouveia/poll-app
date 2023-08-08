<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vote extends Model
{
    use HasFactory;

    //a vote belongs to an option
    public function option(): BelongsTo
    {
        return $this->belongsTo(Option::class);
    }
}
