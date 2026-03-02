@extends('layout')

@section('content')
<section class="content-surface section-block reveal-up">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h1 class="section-title text-center mb-3">{{ $recipe->name }}</h1>
    <p class="text-center text-muted mb-4">
        Dibuat oleh {{ $recipe->user?->name ?? 'Unknown' }} • {{ $recipe->cuisine }} • {{ $recipe->difficulty }}
    </p>

    <img
        src="{{ asset('storage/' . $recipe->image) }}"
        alt="{{ $recipe->name }}"
        class="w-100 rounded mb-4"
        style="max-height: 360px; object-fit: cover;"
    >

    <div class="row g-4">
        <div class="col-md-6">
            <h5>Deskripsi</h5>
            <p class="text-muted">{{ $recipe->description }}</p>
        </div>
        <div class="col-md-6">
            <h5>Informasi</h5>
            <ul class="ingredients-list">
                <li>Tipe Makanan: {{ $recipe->meal_course }}</li>
                <li>Waktu Masak: {{ $recipe->time }} menit</li>
                <li>Asal Negara: {{ $recipe->origin }}</li>
                <li>Tingkat Kesulitan: {{ $recipe->difficulty }}</li>
            </ul>
        </div>

        <div class="col-md-4">
            <h5>Bahan-bahan</h5>
            <ul class="ingredients-list">
                @forelse ($recipe->ingredients as $ingredient)
                    <li>{{ $ingredient->name }} - {{ $ingredient->quantity }}</li>
                @empty
                    <li>Belum ada data bahan.</li>
                @endforelse
            </ul>
        </div>

        <div class="col-md-4">
            <h5>Langkah-langkah</h5>
            <ol class="ingredients-list">
                @forelse ($recipe->steps as $step)
                    <li>{{ $step->description }}</li>
                @empty
                    <li>Belum ada data langkah.</li>
                @endforelse
            </ol>
        </div>

        <div class="col-md-4">
            <h5>Peralatan</h5>
            <ul class="ingredients-list">
                @forelse ($recipe->equipments as $equipment)
                    <li>{{ $equipment->name }}</li>
                @empty
                    <li>Belum ada data peralatan.</li>
                @endforelse
            </ul>
        </div>
    </div>

    <div class="d-flex gap-2 mt-4 flex-wrap">
        <a href="{{ route('recipes.index') }}" class="page-pill">Kembali</a>

        @auth
            @can('update', $recipe)
                <a href="{{ route('recipes.edit', $recipe) }}" class="btn-modern">Edit Resep</a>
            @endcan
            @can('delete', $recipe)
                <a href="{{ route('recipes.delete.confirmation', $recipe) }}" class="page-pill">Hapus Resep</a>
            @endcan
        @endauth
    </div>
</section>
@endsection
