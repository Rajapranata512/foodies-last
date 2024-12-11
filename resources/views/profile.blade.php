@extends('layout')
@section('content')
<div class="container-fluid vh-100 d-flex justify-content-center align-items-center" style="background-image: url('/images/background.jpg');
background-size: cover;
background-repeat: no-repeat;
background-position: center;">
    @if (Auth::check())
        <div class="profile-section">
            <div class="card-body" style="background-color: white; color: white; border-radius: 15px; padding: 20px;">
                <img src="{{ asset('images/user.jpg') }}" alt="Foodies" class="logo-image" style="height: 300px">
                <h3 style="color: black">Selamat datang, {{ Auth::user()->name }}</h3>
                <p style="color: black">Email: {{ Auth::user()->email }}</p>
                <div class="d-flex justify-content-center align-items-center">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    @else
        <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
    @endif
</div>
@endsection
