@extends('layouts.app')

@section('title', 'Login')

@section('content')
    {{-- Navbar --}}
    @include('components.navbar')

    <div class="row">
        <!-- left -->
        <div class="col-lg-3">
            <img src="{{ asset('images/logos/blue5.png') }}" alt="bluecat" class="bluecat">
        </div>

        <!-- center -->
        <div class="card border-0 col-lg-6 mt-3 d-flex align-items-center justify-content-center">
            <img src="{{ asset('images/logos/red5.png') }}" alt="redcat" class="redcat">

            <div class="card-img-overlay">
                <h2 class="text-kurenai text-center mt-5 pt-5">Welcome back to Omotenaship</h2>

                {{-- Login --}}
                <form method="POST" action="{{ route('login') }}" class="mt-4">
                    @if (session('message'))
                        <div class="alert alert-danger">
                            {{ session('message') }}
                        </div>
                    @endif
                {{-- <form method="POST" action="{{ route('login.store') }}" class="mt-4"> --}}
                    @csrf

                    <!-- username -->
                    <div class="row mb-3">
                        <label for="name" class="col-md-3 col-form-label text-black">{{ __('Username') }}</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control bg-transparent" id="name" name="name"
                                value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- email (temporary) -->
                    <div class="row mb-3">
                        <label for="email" class="col-md-3 col-form-label text-black">{{ __('Email') }}</label>
                        <div class="col-md-6">
                            <input type="email" class="form-control bg-transparent" id="email" name="email"
                                value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- password -->
                    <div class="row mb-3">
                        <label for="password" class="col-md-3 col-form-label text-black">{{ __('Password') }}</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control bg-transparent" id="password" name="password"
                                value="{{ old('password') }}" required autocomplete="password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- login -->
                    <div class="row mb-3">
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-kurenai w-50">
                                Login
                            </button>
                        </div>

                        {{-- Link to Register Page --}}
                        <a href={{ route('register') }} class="text-black text-center">Don't have an account yet?
                            Register</a>
                    </div>
                </form>
            </div>
        </div>

        <!-- right -->
        <div class="col-lg-3 p-0">
            <img src="{{ asset('/images/logos/blue5.png') }}" alt="bluecat" class="bluecat">
        </div>
    </div>

    {{-- Footer --}}
    @include('components.footer')
@endsection
