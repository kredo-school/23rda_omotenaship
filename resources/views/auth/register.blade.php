@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="row">
        <!-- left -->
        <div class="col-lg-3">
            <img src="{{ asset('images/logos/blue5.png') }}" alt="bluecat" class="bluecat">
        </div>

        <!-- center -->
        <div class="card border-0 col-lg-6 mt-3 d-flex align-items-center justify-content-center">
            <img src="{{ asset('images/logos/red5.png') }}" alt="redcat" class="redcat">

            <div class="card-img-overlay">
                <h2 class="text-kurenai text-center mt-5 pt-5">Welcome to Omotenaship</h2>

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
                    <div class="row mb-3">
                        <div class="d-flex justify-content-center">
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

        <!-- right -->
        <div class="col-lg-3 p-0">
            <img src="{{ asset('/images/logos/blue5.png') }}" alt="bluecat" class="bluecat">
        </div>
    </div>
@endsection
