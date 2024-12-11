<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    public function steps()
    {
        return $this->hasMany(Step::class);
    }

    public function equipments()
    {
        return $this->hasMany(Equipment::class);
    }

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }

    protected $fillable = [
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
