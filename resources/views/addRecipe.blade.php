@extends('layout')
@section('content')
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center" style="background-image: url('/images/background.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;">
        <div class="col-lg-4 col-md-6 col-sm-8 shadow rounded p-4 bg-white">
            <h1 class="text-center mb-4" style="color: #333; font-weight: bold;">Tambah Resep</h1>
            <form action="{{ route('store.recipe') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Resep</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Contoh: Carbonara" required>
                </div>

                <div class="mb-3">
                    <label for="cuisine" class="form-label">Cuisine</label>
                    <select name="cuisine" id="cuisine" class="form-select" aria-label="Large Select Cuisine" required>
                        <option value="" selected disabled>Pilih Cuisine</option>
                        @foreach ($cuisines as $cuisine)
                            <option value="{{ $cuisine }}">{{ $cuisine }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi Resep</label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Carbonara adalah hidangan pasta yang terbuat dari telur, pancetta, dan keju" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="meal_course" class="form-label">Tipe Makanan</label>
                    <select name="meal_course" id="meal_course" class="form-select" aria-label="Large Select Meal Course" required>
                        <option value="" selected disabled>Pilih tipe makanan</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course }}">{{ $course }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="time" class="form-label">Waktu Memasak (dalam menit)</label>
                    <input type="number" class="form-control" id="time" name="time" placeholder="Contoh: 50" required>
                </div>

                <div class="mb-3">
                    <label for="origin" class="form-label">Asal Resep</label>
                    <input type="text" class="form-control" id="origin" name="origin" placeholder="Contoh: Japanese" required>
                </div>

                <div class="mb-3">
                    <label for="difficulty" class="form-label">Tingkat Kesulitan</label>
                    <select name="difficulty" id="difficulty" class="form-select" aria-label="Default Select Difficulty" required>
                        <option value="" selected disabled>Pilih tingkat kesulitan</option>
                        @foreach ($difficulties as $difficulty)
                            <option value="{{ $difficulty }}">{{ $difficulty }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar Resep</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Tambahkan Resep</button>
                </div>
            </form>
        </div>
    </div>
@endsection
