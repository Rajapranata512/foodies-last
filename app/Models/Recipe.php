<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Recipe extends Model
{
    use HasFactory;

    public const CUISINES = [
        'Western',
        'Asian',
        'Middle Eastern',
        'African',
    ];

    public const COURSES = [
        'Dessert',
        'Main Course',
        'Appetizer',
    ];

    public const DIFFICULTIES = [
        'Easy',
        'Medium',
        'Hard',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function steps(): HasMany
    {
        return $this->hasMany(Step::class);
    }

    public function equipments(): HasMany
    {
        return $this->hasMany(Equipment::class);
    }

    public function ingredients(): HasMany
    {
        return $this->hasMany(Ingredient::class);
    }

    protected $fillable = [
        'user_id',
        'name',
        'cuisine',
        'description',
        'meal_course',
        'time',
        'origin',
        'difficulty',
        'image',
    ];
}
