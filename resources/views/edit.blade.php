@extends('layout')

@section('content')
<section class="content-surface section-block reveal-up">
    <h1 class="section-title text-center mb-4">Edit Resep</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('recipes.update', $recipe) }}" method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf
        @method('PUT')

        <div class="col-md-6">
            <label for="name" class="form-label">Nama Resep</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $recipe->name) }}" required>
        </div>

        <div class="col-md-6">
            <label for="cuisine" class="form-label">Cuisine</label>
            <select name="cuisine" id="cuisine" class="form-select" required>
                @foreach ($cuisines as $cuisine)
                    <option value="{{ $cuisine }}" {{ old('cuisine', $recipe->cuisine) === $cuisine ? 'selected' : '' }}>{{ $cuisine }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label for="meal_course" class="form-label">Tipe Makanan</label>
            <select name="meal_course" id="meal_course" class="form-select" required>
                @foreach ($courses as $course)
                    <option value="{{ $course }}" {{ old('meal_course', $recipe->meal_course) === $course ? 'selected' : '' }}>{{ $course }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label for="time" class="form-label">Waktu Memasak (menit)</label>
            <input type="number" name="time" id="time" class="form-control" value="{{ old('time', $recipe->time) }}" min="1" required>
        </div>

        <div class="col-md-4">
            <label for="difficulty" class="form-label">Tingkat Kesulitan</label>
            <select name="difficulty" id="difficulty" class="form-select" required>
                @foreach ($difficulties as $difficulty)
                    <option value="{{ $difficulty }}" {{ old('difficulty', $recipe->difficulty) === $difficulty ? 'selected' : '' }}>{{ $difficulty }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-8">
            <label for="origin" class="form-label">Asal Negara</label>
            <input type="text" name="origin" id="origin" class="form-control" value="{{ old('origin', $recipe->origin) }}" required>
        </div>

        <div class="col-md-4">
            <label for="image" class="form-label">Gambar Baru</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
            <small class="text-muted">Kosongkan jika tidak mengganti gambar.</small>
        </div>

        <div class="col-12">
            <label for="description" class="form-label">Deskripsi Resep</label>
            <textarea name="description" id="description" rows="4" class="form-control" required>{{ old('description', $recipe->description) }}</textarea>
        </div>

        <div class="col-12 d-flex gap-2">
            <a href="{{ route('recipes.show', $recipe) }}" class="page-pill">Kembali</a>
            <button type="submit" class="btn-modern">Update Resep</button>
        </div>
    </form>
</section>
@endsection
