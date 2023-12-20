<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChallengeDays extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_challenge_id',
        'date',
        'calories_consumed',
        'completed',
    ];

    public function userChallenges(): BelongsTo
    {
        return $this->belongsTo(UserChallenge::class);
    }
}
