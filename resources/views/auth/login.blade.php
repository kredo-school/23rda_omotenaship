@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="container-fluid p-0">
        <div class="row" style="height: 100vh;">
            <!-- left -->
            <div class="col-lg-3 p-0" style="background-image: url('{{ asset('/images/logos/blue5.jpg') }}'); background-size: cover; background-position: center; height: 33vh; margin-top: 50vh;">
                <!-- <div class="d-flex justify-content-center align-items-end h-100">
                </div> -->
            </div>
            <!-- center -->
            <div class="col-lg-6 mx-auto p-0 d-flex justify-content-center align-items-center" style="background-image: url('{{ asset('/images/logos/red5.jpg') }}'); background-size: cover; background-position: center; height: 100vh;">
                <div class="text-center text-danger w-100" style="max-width: 500px;">
                    <h2>{{ __('Welcome back to Omotenaship') }}</h2>
                    <form method="POST" action="{{ route('login') }}" class="mt-4">
                        @csrf
                        <!-- username -->
                        <div class="row mb-3">
                            <label for="username" class="col-md-3 col-form-label text-black">{{ __('Username') }}</label>
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control bg-transparent"name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                            <!-- ↑のclassに@error('username') is-invalid @enderror -->
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
                                <input id="username" type="text" class="form-control bg-transparent"name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>
                            <!-- ↑のclassに@error('password') is-invalid @enderror -->
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- login -->
                        <div class="row mb-0">
                            <div class="">
                                <button type="submit" class="btn btn-danger w-50">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- right -->
            <div class="col-lg-3 p-0" style="background-image: url('{{ asset('/images/logos/blue5.jpg') }}'); background-size: cover; background-position: center; height: 33vh; margin-top: 50vh;">
            </div>
        </div>
    </div>
</div>
@endsection
