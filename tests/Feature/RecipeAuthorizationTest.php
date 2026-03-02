<?php

namespace Tests\Feature;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class RecipeAuthorizationTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_access_recipe_creation_page(): void
    {
        $this->get(route('recipes.create'))->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_create_recipe(): void
    {
        Storage::fake('public');
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('recipes.store'), [
            'name' => 'Sate Ayam',
            'cuisine' => 'Asian',
            'description' => 'Resep sate ayam sederhana.',
            'meal_course' => 'Main Course',
            'time' => 35,
            'origin' => 'Indonesia',
            'difficulty' => 'Medium',
            'image' => UploadedFile::fake()->image('sate.jpg'),
        ]);

        $recipe = Recipe::first();

        $response->assertRedirect(route('recipes.show', $recipe));
        $this->assertDatabaseHas('recipes', [
            'id' => $recipe->id,
            'user_id' => $user->id,
            'name' => 'Sate Ayam',
        ]);
    }

    public function test_non_owner_cannot_update_recipe(): void
    {
        $owner = User::factory()->create();
        $nonOwner = User::factory()->create();
        $recipe = Recipe::factory()->for($owner)->create();

        $response = $this->actingAs($nonOwner)->put(route('recipes.update', $recipe), [
            'name' => 'Updated Name',
            'cuisine' => 'Asian',
            'description' => 'Updated desc',
            'meal_course' => 'Main Course',
            'time' => 20,
            'origin' => 'Indonesia',
            'difficulty' => 'Easy',
        ]);

        $response->assertForbidden();
    }

    public function test_non_owner_cannot_delete_recipe(): void
    {
        $owner = User::factory()->create();
        $nonOwner = User::factory()->create();
        $recipe = Recipe::factory()->for($owner)->create();

        $response = $this->actingAs($nonOwner)->delete(route('recipes.destroy', $recipe));

        $response->assertForbidden();
        $this->assertDatabaseHas('recipes', ['id' => $recipe->id]);
    }

    public function test_admin_can_update_any_recipe(): void
    {
        $owner = User::factory()->create();
        $admin = User::factory()->create(['role' => 'admin']);
        $recipe = Recipe::factory()->for($owner)->create();

        $response = $this->actingAs($admin)->put(route('recipes.update', $recipe), [
            'name' => 'Admin Updated Name',
            'cuisine' => 'Asian',
            'description' => 'Updated by admin',
            'meal_course' => 'Main Course',
            'time' => 25,
            'origin' => 'Indonesia',
            'difficulty' => 'Easy',
        ]);

        $response->assertRedirect(route('recipes.show', $recipe));
        $this->assertDatabaseHas('recipes', [
            'id' => $recipe->id,
            'name' => 'Admin Updated Name',
        ]);
    }

    public function test_admin_can_delete_any_recipe(): void
    {
        $owner = User::factory()->create();
        $admin = User::factory()->create(['role' => 'admin']);
        $recipe = Recipe::factory()->for($owner)->create();

        $response = $this->actingAs($admin)->delete(route('recipes.destroy', $recipe));

        $response->assertRedirect(route('recipes.index'));
        $this->assertDatabaseMissing('recipes', ['id' => $recipe->id]);
    }
}
