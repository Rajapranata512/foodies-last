@extends('layout')

@section('content')
<div class="container-fluid vh-100 d-flex justify-content-center align-items-center" style="background-image: url('/images/background.jpg'); background-size: cover; background-position: center;">
    <div class="card shadow-lg" style="max-width: 500px; width: 100%; padding: 20px; background-color: white; border-radius: 10px;">
        <div class="card-body text-center">
            <h3 class="card-title mb-4" style="color: #333; font-weight: bold;">Hapus Recipe</h3>
            <p>Apakah Anda yakin ingin menghapus recipe <strong>{{ $recipe->name }}</strong>?</p>
            <form action="{{ route('delete.recipe', ['id' => $recipe->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger me-2">Ya, Hapus</button>
                <a href="{{ route('allRecipes') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
