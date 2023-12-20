<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserChallenge extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'challenge_id',
        'start_date',
        'end_date',
        'status',
    ];

    
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function challenges(): BelongsTo
    {
        return $this->belongsTo(Challenge::class);
    }

    public function challengeDays(): HasMany
    {
        return $this->hasMany(ChallengeDays::class);
    }
}