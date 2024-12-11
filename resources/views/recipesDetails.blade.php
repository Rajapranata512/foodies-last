

@extends('layout')

@section('content')

<div style="max-width: 800px; margin: 0 auto; padding: 20px; background-color: #fff; box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1); border-radius: 8px;">

    <!-- Pesan Sukses -->
    @if(session('success'))
        <div style="padding: 10px; margin-bottom: 20px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    <h1 style="text-align: center; margin: 20px 0;">{{ $recipe->name }}</h1>
    <img
        src="{{ asset('storage/' . $recipe->image) }}"
        alt="{{ $recipe->name }}"
        style="width: 100%; height: 300px; object-fit: cover; border-radius: 8px; margin-bottom: 20px;"
    >

    <h2 style="color: #333;">Deskripsi</h2>
    <p style="font-size: 16px; color: #555;">{{ $recipe->description }}</p>

    <h2 style="color: #333;">Cuisine</h2>
    <p style="font-size: 16px; color: #555;">{{ $recipe->cuisine }}</p>

    <h2 style="color: #333;">Tipe Makanan (menit)</h2>
    <p style="font-size: 16px; color: #555;">{{ $recipe->meal_course }}</p>

    <h2 style="color: #333;">Waktu Masak</h2>
    <p style="font-size: 16px; color: #555;">{{ $recipe->time }} minutes</p>

    <h2 style="color: #333;">Asal Negara</h2>
    <p style="font-size: 16px; color: #555;">{{ $recipe->origin }}</p>

    <h2 style="color: #333;">Tingkat Kesulitan</h2>
    <p style="font-size: 16px; color: #555;">{{ $recipe->difficulty }}</p>

    <h2 style="color: #333;">Bahan - bahan</h2>
    <ul style="font-size: 16px; color: #555;">
        @foreach ($recipe->ingredients as $ingredient)
            <li>{{ $ingredient->name }} - {{ $ingredient->quantity }}</li>
        @endforeach
    </ul>

    <h2 style="color: #333;">Langkah - langkah</h2>
    <ol style="font-size: 16px; color: #555;">
        @foreach ($recipe->steps as $step)
            <li>{{ $step->description }}</li>
        @endforeach
    </ol>

    <h2 style="color: #333;">Peralatan</h2>
    <ul style="font-size: 16px; color: #555;">
        @foreach ($recipe->equipments as $equipment)
            <li>{{ $equipment->name }}</li>
        @endforeach
    </ul>

    <!-- Back & Edit Buttons -->
    <div style="text-align: left; margin-top: 20px; display: flex; gap: 10px;">
        <a href="{{ route('allRecipes') }}" class="btn btn-primary" style="padding: 10px 20px; background-color: #007BFF; color: white; text-decoration: none; border-radius: 5px;">
            Kembali
        </a>
        <a href="{{ route('recipe.edit', ['id' => $recipe->id]) }}" class="btn btn-success" style="padding: 10px 20px; background-color: #42d565; color: white; text-decoration: none; border-radius: 5px;">
            Edit Resep
        </a>
        <a href="{{route('delete.confirmation', $recipe->id)}}" class="btn btn-uccess" style="padding: 10px 20px; background-color: #e24f44; color: white; text-decoration: none; border-radius: 5px;">
            Hapus Resep
        </a>
    </div>
</div>

@endsection


