@extends('layouts.app')

@section('title', 'Register')

@section('content')

    @include('components.navbar')

    <div class="row">
        <!-- left -->
        <div class="col-lg-3">
            <img src="{{ asset('images/logos/blue5.jpg') }}" alt="bluecat">
        </div>
        <!-- center -->
        <div class="card border-0 col-lg-6 mt-3">
            <img src="{{ asset('images/logos/red5.jpg') }}" alt="redcat">

            <div class="card-img-overlay  position-absolute top-50 start-50 translate-middle">
                <h2 class="text-kurenai text-center">Welcome to Omotenaship</h2>

                <form method="POST" action="{{ route('register') }}" class="mt-4">
                    @csrf
                    <!-- username -->
                    <div class="row mb-3">
                        <label for="username" class="col-md-3 col-form-label text-black">{{ __('Username') }}</label>
                        <div class="col-md-6">
                            <input id="username" type="text" class="form-control bg-transparent"name="username"
                                value="{{ old('username') }}" required autocomplete="username" autofocus>
                            <!-- ↑のclassに@error('username')
        is-invalid
    @enderror -->
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
                            <input id="username" type="text" class="form-control bg-transparent"name="password"
                                value="{{ old('password') }}" required autocomplete="password" autofocus>
                            <!-- ↑のclassに@error('password')
        is-invalid
    @enderror -->
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Comfirm password -->
                    <div class="row mb-3">
                        <label for="comfirmpassword"
                            class="col-md-3 col-form-label text-black">{{ __('Comfirm Password') }}</label>
                        <div class="col-md-6">
                            <input id="comfirmpassword" type="text"
                                class="form-control bg-transparent"name="comfirmpassword"
                                value="{{ old('comfirmpassword') }}" required autocomplete="comfirmpassword" autofocus>

                            @error('comfirmpassword')
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
                                Register</button>
                        </div>
                        <a href={{ route('login') }} class="text-black text-center">Alredy have an account? Login</a>

                    </div>
                </form>
            </div>
        </div>
        <!-- right -->
        <div class="col-lg-3 p-0">
            <img src="{{ asset('/images/logos/blue5.jpg') }}" alt="bluecat">
        </div>
    </div>

    @include('components.footer')

@endsection
