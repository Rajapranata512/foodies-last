<?php

namespace App\Policies;

use App\Models\Recipe;
use App\Models\User;

class RecipePolicy
{
    public function create(User $user): bool
    {
        return $user->exists;
    }

    public function update(User $user, Recipe $recipe): bool
    {
        return $user->isAdmin() || $user->id === $recipe->user_id;
    }

    public function delete(User $user, Recipe $recipe): bool
    {
        return $user->isAdmin() || $user->id === $recipe->user_id;
    }
}
