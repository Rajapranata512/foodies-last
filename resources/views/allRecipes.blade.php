@extends('layout')

@section('content')
<section class="content-surface recipes-page reveal-up">
    <div class="recipes-header">
        <h1>Semua Resep</h1>
        <p>Temukan resep berdasarkan cuisine favorit atau kata kunci yang kamu cari.</p>
        @auth
            <a href="{{ route('recipes.create') }}" class="btn-modern mt-3">Tambah Resep Baru</a>
        @endauth
    </div>

    <form action="{{ route('recipes.index') }}" method="GET" class="recipes-filter">
        <select name="cuisine">
            <option value="">Semua Cuisine</option>
            <option value="Western" {{ request('cuisine') == 'Western' ? 'selected' : '' }}>Western</option>
            <option value="Asian" {{ request('cuisine') == 'Asian' ? 'selected' : '' }}>Asian</option>
            <option value="Middle Eastern" {{ request('cuisine') == 'Middle Eastern' ? 'selected' : '' }}>Middle Eastern</option>
            <option value="African" {{ request('cuisine') == 'African' ? 'selected' : '' }}>African</option>
        </select>

        <input
            type="text"
            name="search"
            placeholder="Cari resep..."
            value="{{ request('search') }}"
        >

        <button type="submit" class="btn-modern">Cari</button>
    </form>
</section>

@if($recipes->isEmpty())
    <section class="content-surface section-block text-center reveal-up">
        <h2 class="section-title mb-2">Belum Ada Hasil</h2>
        <p class="text-muted mb-0">Tidak ada resep yang cocok. Coba ubah filter atau tambah resep baru.</p>
    </section>
@else
    <section class="recipes-grid reveal-up">
        @foreach ($recipes as $recipe)
            <article class="recipe-card">
                <img
                    src="{{ asset('storage/' . $recipe->image) }}"
                    alt="{{ $recipe->name }}"
                    onerror="this.onerror=null;this.src='{{ asset('images/logo.jpg') }}';"
                >

                <div class="recipe-card-content">
                    <div>
                        <span class="meta-chip">{{ $recipe->cuisine }}</span>
                    </div>

                    <h3>{{ $recipe->name }}</h3>
                    <p>{{ $recipe->description }}</p>

                    <ul class="ingredients-list">
                        @foreach ($recipe->ingredients as $ingredient)
                            <li>{{ $ingredient->name }} - {{ $ingredient->quantity }}</li>
                        @endforeach
                    </ul>

                    <a href="{{ route('recipes.show', $recipe) }}" class="btn-modern mt-2">Lihat Detail</a>
                </div>
            </article>
        @endforeach
    </section>
@endif

@if ($recipes->lastPage() > 1)
    <nav class="recipes-pagination reveal-up" aria-label="Pagination">
        @if ($recipes->onFirstPage())
            <span class="page-pill disabled">Sebelumnya</span>
        @else
            <a href="{{ $recipes->appends(request()->query())->previousPageUrl() }}" class="page-pill">Sebelumnya</a>
        @endif

        <span class="page-pill">Halaman {{ $recipes->currentPage() }} / {{ $recipes->lastPage() }}</span>

        @if ($recipes->hasMorePages())
            <a href="{{ $recipes->appends(request()->query())->nextPageUrl() }}" class="page-pill">Berikutnya</a>
        @else
            <span class="page-pill disabled">Berikutnya</span>
        @endif
    </nav>
@endif
@endsection
