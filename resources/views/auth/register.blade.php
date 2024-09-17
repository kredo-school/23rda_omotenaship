@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div id="register-container" class="container mt-5">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                {{-- Header --}}
                <h2 class="text-kurenai text-center m-0">Welcome to Omotenaship</h2>

                {{-- Forms --}}
                <form method="POST" action="{{ route('register') }}" class="mt-4">
                    @csrf
                    <!-- username -->
                    <div class="row mb-3">
                        <label for="name" class="col-md-3 col-form-label text-black">{{ __('Username') }}</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control bg-transparent" id="name" name="name"
                                value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <p class="mb-0 text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="row mb-3">
                        <label for="email" class="col-md-3 col-form-label text-black">{{ __('Email') }}</label>
                        <div class="col-md-6">
                            <input type="email" class="form-control bg-transparent" id="email" name="email"
                                value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <p class="mb-0 text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- password -->
                    <div class="row mb-3">
                        <label for="password" class="col-md-3 col-form-label text-black">{{ __('Password') }}</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control bg-transparent" id="password" name="password"
                                value="{{ old('password') }}" required autocomplete="password">
                        </div>
                    </div>

                    <!-- Comfirm password -->
                    <div class="row mb-3">
                        <label for="password_confirmation"
                            class="col-md-3 col-form-label text-black">{{ __('Comfirm Password') }}</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control bg-transparent" id="password_confirmation"
                                name="password_confirmation" value="" required>

                            {{-- Error message for password unmached --}}
                            @error('password')
                                <p class="mb-0 text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Register Button -->
                    <div class="row mb-5">
                        <div class="d-flex justify-content-center mb-2">
                            <button type="submit" class="btn btn-kurenai w-50">
                                Register
                            </button>
                        </div>

                        {{-- Link to login page --}}
                        <a href={{ route('login') }} class="text-black text-center">Alredy have an account? Login</a>
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
