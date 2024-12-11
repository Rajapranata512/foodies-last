<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Equipment extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'recipe_id',
        'name',
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
    protected $table = 'equipments';
}
