@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')

    <div class="row justify-content-center">
        <div class="col-8">
            <form action="#" method="" class="bg-white shadow rounded-3 p-5" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                {{-- Page title --}}
                <h2 class="h3 mb-3 fw-light text-muted">
                    Edit Profile
                </h2>

                <div class="mb-3">
                    <div class="row mb-3">
                        {{-- Abatar --}}
                        <div class="col-6">
                            {{-- Avatar Display --}}
                            <div>
                                <img src="{{ asset('images\profile_sample1.png') }}" alt=""
                                    class="mx-auto d-flex justify-content-center align-items-center" style="height: 100px;">
                            </div>
                            {{-- Abatar Upload --}}
                            <div class="col-auto align-self-end">
                                <input type="file" name="avatar" id="avatar"
                                    class="form-control form-control-sm mt-1" aria-describedby="avatar-info">
                                <div class="form-text" id="avatar-info">
                                    <p class="mb-0">
                                        Acceptable formats are jpeg, jpg, png and gif only.
                                    </p>
                                    <p class="mt-0">
                                        Maximum file size is 1048kb.
                                    </p>
                                </div>
                                <!-- Error  -->
                            </div>
                        </div>

                        {{-- Profile Entry Form --}}
                        <div class="col-6">
                            {{-- Name --}}
                            <div class="mb-3">
                                {{-- First name --}}
                                <label for="name" class="form-label fw-bold">
                                    <h5>
                                        First name
                                    </h5>
                                </label>
                                <input type="text" name="name" id="name" class="form-control" autofocus>
                                {{-- Midle name --}}
                                <label for="name" class="form-label fw-bold">
                                    <h5>
                                        Midle name
                                    </h5>
                                </label>
                                <input type="text" name="name" id="name" class="form-control" autofocus>
                                {{-- Last name --}}
                                <label for="name" class="form-label fw-bold">
                                    <h5>
                                        Last name
                                    </h5>
                                </label>
                                <input type="text" name="name" id="name" class="form-control" autofocus>
                            </div>
                            {{-- Date of Birth --}}
                            <label for="datepicker" class="form-label fw-bold mt-3">
                                <h5>
                                    Date of Birth
                                </h5>
                            </label>
                            <input type="text" name="datepicker" id="datepicker" class="form-control" autofocus placeholder="YYYY/MM/DD">{{ old('datepicker') }} >
                            {{-- Language --}}
                            <label for="name" class="form-label fw-bold mt-3">
                                <h5>
                                    Language
                                    <h5>
                            </label>
                            <input type="text" name="name" id="name" class="form-control" autofocus>
                        </div>
                    </div>

                    {{-- Introduction --}}
                    <div class="mb-3">
                        {{-- Introduction -Title --}}
                        <label for="introduction" class="form-label fw-bold">
                            <h5>Introduction</h5>
                        </label>
                        {{-- Introduction -Text --}}
                        <textarea 
                        name="introduction" 
                        id="introduction" 
                        rows="5" 
                        class="form-control" 
                        placeholder="Describe yourself">{{ old('introduction') }}
                    </textarea>
                        <!-- Error -->
                        @error('introduction')
                            <p class="text-danger small">message{{-- {{ $message }} --}}</p>
                        @enderror
                    </div>

                    {{-- Button --}}
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <button type="submit" class="btn btn-kurenai btn-lg px-5 w-100">
                            <h5>Update profile<h5>
                        </button>
                    </div>
            </form>
        </div>
    </div>
@endsection
