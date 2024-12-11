@extends('layout')

@section('content')
<div class="container mt-5 d-flex justify-content-center" style="margin-bottom: 369px">
    <div class="card p-4" style="max-width: 400px; width: 100%;">
        <div class="text-center mb-4">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="img-fluid" style="max-width: 150px;"> <!-- Adjust logo size -->
            <h2 class="mt-3">Foodies</h2>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <div class="text-center">
                <input class="btn btn-primary w-100" type="submit" value="Login">
            </div>
            <div class="text-center">
                <a href="{{route('register')}}">Register</a>
            </div>
        </form>
    </div>
</div>
@endsection
