@extends('layout')

@section('content')
<section class="content-surface section-block reveal-up" style="max-width: 620px; margin-inline: auto;">
    <div class="text-center mb-4">
        <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="img-fluid rounded" style="max-width: 140px;">
        <h2 class="section-title mt-3 mb-0">Buat Akun</h2>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.store') }}" method="POST" class="row g-3">
        @csrf

        <div class="col-12">
            <label for="name" class="form-label">Username</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="col-12">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="col-md-6">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>

        <div class="col-12 d-grid">
            <button class="btn-modern" type="submit">Register</button>
        </div>

        <div class="col-12 text-center">
            <a href="{{ route('login') }}">Sudah punya akun? Login</a>
        </div>
    </form>
</section>
@endsection
