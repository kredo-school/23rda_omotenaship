@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                {{-- Header --}}
                <h2 class="text-kurenai text-center m-0">Welcome back to Omotenaship</h2>

                {{-- Login --}}
                <form method="POST" action="{{ route('login') }}" class="mt-4">
                    @csrf

                    @if (session('message'))
                        <div class="alert alert-danger">
                            {{ session('message') }}
                        </div>
                    @endif

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
                    <div class="row mb-4">
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
                    <div class="row mb-5">
                        <div class="d-flex justify-content-center mb-2">
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
    </div>

    {{-- Icons --}}
    <img src="{{ asset('images/logos/red5.png') }}" alt="Red cat" class="red-cat">
    <img src="{{ asset('/images/logos/blue5.png') }}" alt="Blue cat" class="blue-cat blue-cat-left">
    <img src="{{ asset('/images/logos/blue5.png') }}" alt="Blue cat" class="blue-cat blue-cat-right">
@endsection
