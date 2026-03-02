@extends('layout')

@section('content')
<section class="content-surface section-block reveal-up">
    <h1 class="section-title text-center mb-4">Tambah Resep</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf

        <div class="col-md-6">
            <label for="name" class="form-label">Nama Resep</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="col-md-6">
            <label for="cuisine" class="form-label">Cuisine</label>
            <select name="cuisine" id="cuisine" class="form-select" required>
                <option value="" disabled {{ old('cuisine') ? '' : 'selected' }}>Pilih Cuisine</option>
                @foreach ($cuisines as $cuisine)
                    <option value="{{ $cuisine }}" {{ old('cuisine') === $cuisine ? 'selected' : '' }}>{{ $cuisine }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-12">
            <label for="description" class="form-label">Deskripsi Resep</label>
            <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
        </div>

        <div class="col-md-4">
            <label for="meal_course" class="form-label">Tipe Makanan</label>
            <select name="meal_course" id="meal_course" class="form-select" required>
                <option value="" disabled {{ old('meal_course') ? '' : 'selected' }}>Pilih Tipe</option>
                @foreach ($courses as $course)
                    <option value="{{ $course }}" {{ old('meal_course') === $course ? 'selected' : '' }}>{{ $course }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label for="time" class="form-label">Waktu Memasak (menit)</label>
            <input type="number" class="form-control" id="time" name="time" value="{{ old('time') }}" min="1" required>
        </div>

        <div class="col-md-4">
            <label for="difficulty" class="form-label">Tingkat Kesulitan</label>
            <select name="difficulty" id="difficulty" class="form-select" required>
                <option value="" disabled {{ old('difficulty') ? '' : 'selected' }}>Pilih Level</option>
                @foreach ($difficulties as $difficulty)
                    <option value="{{ $difficulty }}" {{ old('difficulty') === $difficulty ? 'selected' : '' }}>{{ $difficulty }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-8">
            <label for="origin" class="form-label">Asal Resep</label>
            <input type="text" class="form-control" id="origin" name="origin" value="{{ old('origin') }}" required>
        </div>

        <div class="col-md-4">
            <label for="image" class="form-label">Gambar Resep</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
        </div>

        <div class="col-12 d-flex gap-2">
            <button type="submit" class="btn-modern">Simpan Resep</button>
            <a href="{{ route('recipes.index') }}" class="page-pill">Batal</a>
        </div>
    </form>
</section>
@endsection
