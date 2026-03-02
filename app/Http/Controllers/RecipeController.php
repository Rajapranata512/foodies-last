<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    public function homePage()
    {
        return view('homePage');
    }

    public function addRecipe()
    {
        $this->authorize('create', Recipe::class);

        return view('addRecipe', [
            'cuisines' => Recipe::CUISINES,
            'difficulties' => Recipe::DIFFICULTIES,
            'courses' => Recipe::COURSES,
        ]);
    }

    public function storeRecipe(StoreRecipeRequest $request)
    {
        $payload = $request->validated();
        $payload['user_id'] = $request->user()->id;
        $payload['image'] = $request->file('image')->store('images', 'public');

        $recipe = Recipe::create($payload);

        return redirect()
            ->route('recipes.show', $recipe)
            ->with('success', 'Resep berhasil ditambahkan.');
    }

    public function allRecipes(Request $request)
    {
        $query = Recipe::query()
            ->with(['ingredients', 'steps', 'equipments', 'user:id,name'])
            ->latest();

        if ($request->filled('cuisine')) {
            $query->where('cuisine', $request->string('cuisine'));
        }

        if ($request->filled('search')) {
            $search = $request->string('search');
            $query->where(function ($subQuery) use ($search) {
                $subQuery
                    ->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('origin', 'like', "%{$search}%");
            });
        }

        $recipes = $query->paginate(6)->withQueryString();

        return view('allRecipes', compact('recipes'));
    }

    public function details(Recipe $recipe)
    {
        $recipe->load([
            'ingredients',
            'equipments',
            'steps' => fn ($query) => $query->orderBy('step_number'),
            'user:id,name',
        ]);

        return view('recipesDetails', compact('recipe'));
    }

    public function deleteConfirmation(Recipe $recipe)
    {
        $this->authorize('delete', $recipe);

        return view('deleteRecipe', compact('recipe'));
    }

    public function deleteRecipe(Recipe $recipe)
    {
        $this->authorize('delete', $recipe);

        if ($recipe->image && Storage::disk('public')->exists($recipe->image)) {
            Storage::disk('public')->delete($recipe->image);
        }

        $recipe->delete();

        return redirect()
            ->route('recipes.index')
            ->with('success', 'Resep berhasil dihapus.');
    }

    public function edit(Recipe $recipe)
    {
        $this->authorize('update', $recipe);

        return view('edit', [
            'recipe' => $recipe,
            'cuisines' => Recipe::CUISINES,
            'difficulties' => Recipe::DIFFICULTIES,
            'courses' => Recipe::COURSES,
        ]);
    }

    public function update(UpdateRecipeRequest $request, Recipe $recipe)
    {
        $this->authorize('update', $recipe);

        $payload = $request->validated();

        if ($request->hasFile('image')) {
            if ($recipe->image && Storage::disk('public')->exists($recipe->image)) {
                Storage::disk('public')->delete($recipe->image);
            }

            $payload['image'] = $request->file('image')->store('images', 'public');
        }

        $recipe->update($payload);

        return redirect()
            ->route('recipes.show', $recipe)
            ->with('success', 'Resep berhasil diperbarui.');
    }
}
