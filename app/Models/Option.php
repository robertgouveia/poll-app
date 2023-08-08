<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Option extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    //the options belong to a poll
    public function poll(): BelongsTo
    {
        return $this->belongsTo(Poll::class);
    }

    //the options have many votes
    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }
}
