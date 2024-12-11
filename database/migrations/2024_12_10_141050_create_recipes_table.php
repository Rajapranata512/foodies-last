<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', length:100); // Nama Dish
            $table->enum('cuisine', ['Western', 'Asian', 'Middle Eastern', 'African']); // Asal Dish
            $table->text('description'); // Deskripsi Dish
            $table->enum('meal_course', ['Dessert', 'Main Course', 'Appetizer']); // Tipe Dish
            $table->integer('time'); // Waktu memasak
            $table->string('origin', length:100); // Negara asal Dish
            $table->enum('difficulty', ['Easy', 'Medium', 'Hard']); // Tingkat kesulitan
            $table->string('image', length:255); // Gambar Dish
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
