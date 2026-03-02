<?php

namespace App\Http\Requests;

use App\Models\Recipe;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRecipeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'cuisine' => ['required', Rule::in(Recipe::CUISINES)],
            'description' => ['required', 'string'],
            'meal_course' => ['required', Rule::in(Recipe::COURSES)],
            'time' => ['required', 'integer', 'min:1'],
            'origin' => ['required', 'string', 'max:100'],
            'difficulty' => ['required', Rule::in(Recipe::DIFFICULTIES)],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
        ];
    }
}
