<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RecipeController::class, 'homePage'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'doRegister'])->name('register.store');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'processLogin'])->name('login.process');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');

    Route::get('/recipes/create', [RecipeController::class, 'addRecipe'])->name('recipes.create');
    Route::post('/recipes', [RecipeController::class, 'storeRecipe'])->name('recipes.store');
    Route::get('/recipes/{recipe}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
    Route::put('/recipes/{recipe}', [RecipeController::class, 'update'])->name('recipes.update');
    Route::get('/recipes/{recipe}/delete', [RecipeController::class, 'deleteConfirmation'])->name('recipes.delete.confirmation');
    Route::delete('/recipes/{recipe}', [RecipeController::class, 'deleteRecipe'])->name('recipes.destroy');
});

Route::get('/recipes', [RecipeController::class, 'allRecipes'])->name('recipes.index');
Route::get('/recipes/{recipe}', [RecipeController::class, 'details'])->name('recipes.show');

Route::redirect('/allRecipes', '/recipes');
Route::redirect('/addRecipe', '/recipes/create');
