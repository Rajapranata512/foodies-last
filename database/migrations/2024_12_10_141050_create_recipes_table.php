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
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('name', 100);
            $table->string('cuisine', 50);
            $table->text('description');
            $table->string('meal_course', 50);
            $table->unsignedSmallInteger('time');
            $table->string('origin', 100);
            $table->string('difficulty', 20);
            $table->string('image', 255);
            $table->timestamps();

            $table->index(['cuisine', 'difficulty']);
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
