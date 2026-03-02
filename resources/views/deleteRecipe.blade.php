@extends('layout')

@section('content')
<section class="content-surface section-block reveal-up text-center">
    <h2 class="section-title mb-3">Hapus Resep</h2>
    <p>Apakah Anda yakin ingin menghapus resep <strong>{{ $recipe->name }}</strong>?</p>

    <form action="{{ route('recipes.destroy', $recipe) }}" method="POST" class="d-flex justify-content-center gap-2 mt-3">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
        <a href="{{ route('recipes.show', $recipe) }}" class="page-pill">Batal</a>
    </form>
</section>
@endsection
