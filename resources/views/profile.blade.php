@extends('layout')

@section('content')
<section class="content-surface section-block reveal-up text-center" style="max-width: 620px; margin-inline: auto;">
    <img src="{{ asset('images/user.jpg') }}" alt="User" class="rounded-circle mx-auto mb-3" style="height: 140px; width: 140px; object-fit: cover;">
    <h2 class="section-title mb-2">Halo, {{ auth()->user()->name }}</h2>
    <p class="text-muted mb-4">{{ auth()->user()->email }}</p>

    <div class="d-flex justify-content-center gap-2">
        <a href="{{ route('recipes.create') }}" class="btn-modern">Tambah Resep</a>
        <a href="{{ route('recipes.index') }}" class="page-pill">Lihat Semua Resep</a>
    </div>
</section>
@endsection
