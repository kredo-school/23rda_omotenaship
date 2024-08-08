@extends('layouts.app')

@section('title', 'Register')

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
                <h2 class="text-kurenai text-center mt-5 pt-5">Welcome to Omotenaship</h2>

                <form method="POST" action="{{ route('register') }}" class="mt-4">
                    @csrf

                    <!-- username -->
                    <div class="row mb-3">
                        <label for="username" class="col-md-3 col-form-label text-black">{{ __('Username') }}</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control bg-transparent" id="username" name="username"
                                value="{{ old('username') }}" required autocomplete="username" autofocus>

                            @error('username')
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

                    <!-- Comfirm password -->
                    <div class="row mb-3">
                        <label for="password_confirmation"
                            class="col-md-3 col-form-label text-black">{{ __('Comfirm Password') }}</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control bg-transparent" id="password_confirmation"
                                name="password_confirmation" value="" required>

                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
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

    {{-- Footer --}}
    @include('components.footer')
@endsection
