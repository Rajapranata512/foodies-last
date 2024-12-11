
@extends('layout')

@section('content')

<div style="max-width: 800px; margin: 0 auto; padding: 20px; background-color: #fff; box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1); border-radius: 8px;">
    <h1 style="text-align: center; margin-bottom: 20px;">Edit Recipe</h1>
    <form action="{{ route('recipe.update', $recipe->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Nama Resep -->
        <div style="margin-bottom: 15px;">
            <label for="name" style="display: block; font-weight: bold; margin-bottom: 5px;">Nama Resep</label>
            <input type="text" name="name" id="name" value="{{ $recipe->name }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
        </div>

        <!-- Cuisine -->
        <div style="margin-bottom: 15px;">
            <label for="cuisine" style="display: block; font-weight: bold; margin-bottom: 5px;">Cuisine</label>
            <select name="cuisine" id="cuisine" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
                <option value="Western" {{ $recipe->cuisine == 'Western' ? 'selected' : '' }}>Western</option>
                <option value="Asian" {{ $recipe->cuisine == 'Asian' ? 'selected' : '' }}>Asian</option>
                <option value="Middle Eastern" {{ $recipe->cuisine == 'Middle Eastern' ? 'selected' : '' }}>Middle Eastern</option>
                <option value="Latin" {{ $recipe->cuisine == 'Latin' ? 'selected' : '' }}>Latin</option>
            </select>
        </div>

        <!-- Meal Course -->
        <div style="margin-bottom: 15px;">
            <label for="meal_course" style="display: block; font-weight: bold; margin-bottom: 5px;">Tipe Makanan</label>
            <select name="meal_course" id="meal_course" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
                <option value="Appetizer" {{ $recipe->meal_course == 'Appetizer' ? 'selected' : '' }}>Appetizer</option>
                <option value="Main Course" {{ $recipe->meal_course == 'Main Course' ? 'selected' : '' }}>Main Course</option>
                <option value="Dessert" {{ $recipe->meal_course == 'Dessert' ? 'selected' : '' }}>Dessert</option>
            </select>
        </div>

        <!-- Time -->
        <div style="margin-bottom: 15px;">
            <label for="time" style="display: block; font-weight: bold; margin-bottom: 5px;">Waktu Memasak (menit)</label>
            <input type="number" name="time" id="time" value="{{ $recipe->time }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
        </div>

        <!-- Origin -->
        <div style="margin-bottom: 15px;">
            <label for="origin" style="display: block; font-weight: bold; margin-bottom: 5px;">Asal Negara</label>
            <input type="text" name="origin" id="origin" value="{{ $recipe->origin }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
        </div>

        <!-- Difficulty -->
        <div style="margin-bottom: 15px;">
            <label for="difficulty" style="display: block; font-weight: bold; margin-bottom: 5px;">Tingkat Kesulitan</label>
            <select name="difficulty" id="difficulty" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
                <option value="Easy" {{ $recipe->difficulty == 'Easy' ? 'selected' : '' }}>Easy</option>
                <option value="Medium" {{ $recipe->difficulty == 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="Hard" {{ $recipe->difficulty == 'Hard' ? 'selected' : '' }}>Hard</option>
            </select>
        </div>

        <!-- Deskripsi Resep -->
        <div style="margin-bottom: 15px;">
            <label for="description" style="display: block; font-weight: bold; margin-bottom: 5px;">Deskripsi Resep</label>
            <textarea name="description" id="description" rows="4" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" required>{{ $recipe->description }}</textarea>
        </div>

        <!-- Gambar Resep -->
        <div style="margin-bottom: 15px;">
            <label for="image" style="display: block; font-weight: bold; margin-bottom: 5px;">Gambar Resep</label>
            <input type="file" name="image" id="image" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            <p style="font-size: 12px; color: #555; margin-top: 5px;">Biarkan kosong jika tidak ingin mengganti gambar.</p>
        </div>

        <!-- Tombol Back & Submit -->
        <div style="display: flex; gap: 10px; justify-content: left;">
            <a href="{{ route('recipe.details', ['id' => $recipe->id]) }}"
               class="btn btn-primary"
               style="padding: 10px 20px; background-color: #007BFF; color: white; text-decoration: none; border-radius: 5px;">
                Kembali
            </a>
            <button type="submit"
                    style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">
                Update Resep
            </button>
        </div>
    </form>
</div>

@endsection
