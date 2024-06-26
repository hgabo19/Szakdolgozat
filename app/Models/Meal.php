<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'calories',
        'protein',
        'fats',
        'carbonhydrates',
    ];

    public function scopeSearch($query, $value){
        $query->where('name', 'like', "%{$value}%");
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_meals');
    }
}