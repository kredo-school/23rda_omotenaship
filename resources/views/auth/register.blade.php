@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="container-fluid p-0">
            <div class="row" style="height: 100vh;">
                <!-- left -->
                <div class="col-lg-3 p-0"
                    style="background-image: url('{{ asset('/storage/logos/blue5.jpg') }}'); background-size: cover; background-position: center; height: 33vh; margin-top: 50vh;">
                    <!-- <div class="d-flex justify-content-center align-items-end h-100">
                                </div> -->
                </div>
                <!-- center -->
                <div class="col-lg-6 mx-auto p-0 d-flex justify-content-center align-items-center"
                    style="background-image: url('{{ asset('/storage/logos/red5.jpg') }}'); background-size: cover; background-position: center; height: 100vh;">
                    <div class="text-center text-danger w-100" style="max-width: 500px;">
                        <h2>{{ __('Welcome to Omotenaship') }}</h2>

                        <form method="POST" action="{{ route('register') }}" class="mt-4">
                            @csrf

                            <!-- username -->
                            <div class="row mb-3">
                                <label for="username"
                                    class="col-md-3 col-form-label text-black">{{ __('Username') }}</label>
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
                                <label for="password"
                                    class="col-md-3 col-form-label text-black">{{ __('Password') }}</label>
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
                                        name="password_confirmation" value="" required
                                        autocomplete="password_confirmation">

                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- login -->
                            <div class="row mb-3">
                                <div class="">
                                    <button type="submit" class="btn btn-danger w-50">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- right -->
                <div class="col-lg-3 p-0"
                    style="background-image: url('{{ asset('/storage/logos/blue5.jpg') }}'); background-size: cover; background-position: center; height: 33vh; margin-top: 50vh;">
                </div>

            </div>
        </div>
    </div>
@endsection
