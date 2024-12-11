@extends('layout')

@section('content')

<!-- Category dan Search Bar -->


<div class="title-block">
    <div>
        <h1 style="font-size: 50px">Semua Resep</h1>
    </div>
    <div style="display: flex; justify-content: space-between; align-items: center; padding: 20px;">

        <!-- Dropdown for Cuisine -->
        <form action="{{ route('allRecipes') }}" method="GET" style="margin: 0; display: flex; align-items: center; gap: 10px;">
            <select name="cuisine" onchange="this.form.submit()" style="padding: 8px 12px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px;">
                <option value="">Semua Cuisines</option>
                <option value="Western" {{ request('cuisine') == 'Western' ? 'selected' : '' }}>Western</option>
                <option value="Asian" {{ request('cuisine') == 'Asian' ? 'selected' : '' }}>Asian</option>
                <option value="Middle Eastern" {{ request('cuisine') == 'Middle Eastern' ? 'selected' : '' }}>Middle Eastern</option>
                <option value="Latin" {{ request('cuisine') == 'Latin' ? 'selected' : '' }}>Latin</option>
            </select>
        </form>

    <!-- Search Bar -->
        <form action="{{ route('allRecipes') }}" method="GET" style="display: flex; gap: 10px;">
            <input
                type="text"
                name="search"
                placeholder="Search recipes..."
                value="{{ request('search') }}"
                style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; width: 300px;"
            >
            <button
                type="submit"
                style="padding: 8px 16px; background-color: #ff5722; color: white; border: none; border-radius: 5px; cursor: pointer;"
                onmouseover="this.style.backgroundColor='#e64a19';"
                onmouseout="this.style.backgroundColor='#ff5722';">
                Search
            </button>
        </form>
    </div>


</div>

<div style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; padding: 20px;">

    @if($recipes->isEmpty())
        <p style="font-size: 18px; text-align: center;">Tidak ada resep, tambahkan resepmu!</p>
    @else
        @foreach ($recipes as $recipe)
            <div style="display: flex; flex-direction: column; justify-content: space-between; height: auto; min-height: 550px; border: 1px solid #ccc; border-radius: 8px; width: 300px; padding: 15px; background-color: #fff; box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease; cursor: pointer;"
                 onmouseover="this.style.transform='scale(1.05)';" onmouseout="this.style.transform='scale(1)';">

                <!-- Gambar Resep -->
                <div style="overflow: hidden; border-radius: 8px 8px 0 0; max-height: 250px;">
                    <img
                         src="{{ asset('storage/' . $recipe->image) }}"
                        alt="{{ $recipe->name }}"
                        style="width: 100%; height: 250px; object-fit: cover; transition: transform 0.3s ease;"
                        onmouseover="this.style.transform='scale(1.1)';"
                        onmouseout="this.style.transform='scale(1)';"
                        onerror="this.onerror=null;this.src='{{ asset('images/default.jpg') }}';">
                </div>

                <br>

                <!-- Konten Resep -->
                <div style="flex-grow: 1; margin-bottom: 10px; display: flex; flex-direction: column;">
                    <h3 style="margin-bottom: 10px; font-size: 20px; text-align: center; color: #333; min-height: 50px;">{{ $recipe->name }}</h3>
                    <p style="font-size: 14px; color: #555; margin-bottom: 10px; text-align: left; min-height: 80px;">{{ $recipe->description }}</p>
                    <h4 style="font-size: 16px; color: #333; margin-bottom: 5px;">Bahan-bahan:</h4>
                    <ul style="font-size: 14px; color: #555; padding-left: 20px; margin-bottom: 0; min-height: 100px;">
                        @foreach ($recipe->ingredients as $ingredient)
                            <li>{{ $ingredient->name }} - {{ $ingredient->quantity }}</li>
                        @endforeach
                    </ul>
                </div>

                <!-- Tombol View Details -->
                <div style="text-align: center; margin-top: auto;">
                    <a href="{{ route('recipe.details', ['id' => $recipe->id]) }}"
                       style="display: inline-block; padding: 10px 20px; font-size: 14px; font-weight: bold; color: #fff; background-color: #ff5722; text-decoration: none; border-radius: 5px; transition: background-color 0.3s ease, transform 0.2s ease;"
                       onmouseover="this.style.backgroundColor='#e64a19'; this.style.transform='scale(1.1)';"
                       onmouseout="this.style.backgroundColor='#ff5722'; this.style.transform='scale(1)';">
                       Lihat detail
                    </a>
                </div>

            </div>
        @endforeach
    @endif
</div>

<!-- Pagination -->
<div style="text-align: center; margin: 20px 0;">
    @if ($recipes->onFirstPage())
        <span style="padding: 8px 16px; margin: 0 5px; border: 1px solid #ccc; border-radius: 4px; color: #aaa; background-color: #f0f0f0;">Sebelumnya</span>
    @else
        <a href="{{ $recipes->previousPageUrl() }}" style="padding: 8px 16px; margin: 0 5px; border: 1px solid #ccc; border-radius: 4px; text-decoration: none; color: #333; background-color: #f0f0f0;">Sebelumnya</a>
    @endif

    <span style="padding: 8px 16px; margin: 0 5px; border: 1px solid #ccc; border-radius: 4px; background-color: #f0f0f0; color: #000;">
        Page {{ $recipes->currentPage() }} of {{ $recipes->lastPage() }}
    </span>

    @if ($recipes->hasMorePages())
        <a href="{{ $recipes->nextPageUrl() }}" style="padding: 8px 16px; margin: 0 5px; border: 1px solid #ccc; border-radius: 4px; text-decoration: none; color: #333; background-color: #f0f0f0;">Berikutnya</a>
    @else
        <span style="padding: 8px 16px; margin: 0 5px; border: 1px solid #ccc; border-radius: 4px; color: #aaa;">Next</span>
    @endif
</div>

@endsection
