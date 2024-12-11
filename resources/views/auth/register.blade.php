@extends('layout')

@section('content')

    <!-- Full-screen container with centering -->
    <div class="container-fluid d-flex justify-content-center align-items-center min-vh-100" style="background-image: url('/images/background.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;">
        <div class="card" style="max-width: 700px; width: 100%; padding: 20px;">
            <!-- Logo Section -->
            <div class="text-center mb-4">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="img-fluid" style="max-width: 250px;"> <!-- Adjust logo size -->
                <h3 class="mt-3">Register</h3>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    Berhasil mendaftar!!
                </div>
            @endif

            <!-- Registration Form -->
            <form action="{{ route('doregister') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Username</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter your username" value="{{ old('name') }}"/>
                    @error('name')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" value="{{ old('email') }}"/>
                    @error('email')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" value="{{ old('password') }}"/>
                    @error('password')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm your password" value="{{ old('password_confirmation') }}"/>
                    @error('password_confirmation')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-center">
                    <input class="btn btn-primary w-100" type="submit" value="Register">
                </div>
                <div class="text-center">
                    <a href="{{route('login')}}">login</a>
                </div>
            </form>
        </div>
    </div>

@endsection
