@extends('layout')

@section('content')
<section class="content-surface section-block reveal-up" style="max-width: 520px; margin-inline: auto;">
    <div class="text-center mb-4">
        <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="img-fluid rounded" style="max-width: 120px;">
        <h2 class="section-title mt-3 mb-0">Login</h2>
    </div>

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

    <form action="{{ route('login.process') }}" method="POST" class="d-grid gap-3">
        @csrf
        <div>
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" value="1" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">Remember me</label>
        </div>

        <button class="btn-modern" type="submit">Login</button>
        <a href="{{ route('register') }}" class="text-center">Belum punya akun? Daftar</a>
    </form>
</section>
@endsection
