<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    //
    public function homePage(){

        return view('homePage');
    }

    public function addRecipe(){
        $recipes = Recipe::all();
        $cuisines = Recipe::distinct()->pluck('cuisine');
        $difficulties = Recipe::distinct()->pluck('difficulty');
        $courses = Recipe::distinct()->pluck('meal_course');
        return view('addRecipe',
        ['recipes'=>$recipes,
                'cuisines'=>$cuisines,
                'difficulties'=>$difficulties,
                'courses'=>$courses
                ]);
    }

    public function storeRecipe(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'cuisine' => 'required|in:Western,Asian,Middle Eastern,African',
            'description' => 'required|string',
            'meal_course' => 'required|in:Dessert,Main Course,Appetizer',
            'time' => 'required|integer|min:1',
            'origin' => 'required|string|max:100',
            'difficulty' => 'required|in:Easy,Medium,Hard',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // foreach ($request->steps as $step) {
        //     $recipe->steps()->create(['description' => $step]);
        // }
        // foreach ($request->equipments as $equipment) {
        //     $recipe->equipments()->create(['name' => $equipment]);
        // }
        // foreach ($request->ingredients as $ingredient) {
        //     $recipe->ingredients()->create(['name' => $ingredient]);
        // }

        $recipe = new Recipe();
        $recipe->name = $validated['name'];
        $recipe->cuisine = $validated['cuisine'];
        $recipe->description = $validated['description'];
        $recipe->meal_course = $validated['meal_course'];
        $recipe->time = $validated['time'];
        $recipe->origin = $validated['origin'];
        $recipe->difficulty = $validated['difficulty'];
        $recipe->image = $request->file('image')->store('images', 'public');
        $recipe->save();

        return redirect()->back()->with('success', 'Recipe berhasil ditambahkan!');
    }
    public function allRecipes(Request $request)
    {
        $query = Recipe::with(['steps', 'equipments', 'ingredients']);

        if ($request->filled('cuisine')) {
            $query->where('cuisine', $request->input('cuisine'));
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->input('search') . '%');
        }

        $recipes = $query->paginate(5);

        return view('allRecipes', compact('recipes'));
    }


    public function details($id)
    {
        $recipe = Recipe::with(['steps', 'equipments', 'ingredients'])->findOrFail($id);

        return view('recipesDetails', compact('recipe'));
    }

    public function homeDetails($id)
    {
        $recipes = Recipe::with(['steps', 'equipments', 'ingredients'])->findOrFail($id);

        return view('recipesDetails', compact('recipes'));
    }

    public function deleteConfirmation($id)
    {
    $recipe = Recipe::findOrFail($id); // Cari data recipe berdasarkan ID
    return view('deleteRecipe', compact('recipe')); // Arahkan ke view deleteRecipe
    }

    public function deleteRecipe($id)
    {
    // Temukan resep berdasarkan ID
    $recipe = Recipe::find($id);

    if (!$recipe) {
        return redirect()->back()->with('error', 'Recipe tidak ditemukan!');
    }

    // Hapus gambar jika ada
    if ($recipe->image && \Storage::disk('public')->exists($recipe->image)) {
        \Storage::disk('public')->delete($recipe->image);
    }

    // Hapus data resep
    $recipe->delete();

    // Redirect ke halaman sebelumnya dengan pesan sukses
    return redirect()->route('allRecipes')->with('success', 'Recipe berhasil dihapus!');
    }

    public function edit($id)
    {
        $recipe = Recipe::findOrFail($id);
        return view('edit', compact('recipe'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'cuisine' => 'required|string',
            'description' => 'required|string',
            'time' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Cari resep berdasarkan ID
        $recipe = Recipe::findOrFail($id);

        // Update field
        $recipe->name = $validated['name'];
        $recipe->cuisine = $validated['cuisine'];
        $recipe->time = $validated['time'];
        $recipe->description = $validated['description'];

        // Update gambar jika ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $recipe->image = $imagePath;
        }

        // Simpan perubahan
        $recipe->save();

        // Redirect ke halaman detail resep dengan pesan sukses
        return redirect()->route('recipe.details', ['id' => $recipe->id])
                        ->with('success', 'Recipe updated successfully!');
    }




}
