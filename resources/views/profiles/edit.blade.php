@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                {{-- Header --}}
                <div class="section-header mb-5">
                    <h2>
                        <span class="px-2 heading-kurenai">Edit Profile</span>
                    </h2>
                </div>

                <form action="{{ route('profiles.update', $profile->user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    {{-- Abatar&Profile --}}
                    <div class="row mb-3">
                        {{-- Abatar --}}
                        <div class="col-md-6 col-12">
                            {{-- Avatar Display --}}
                            <div class="mb-4">
                                @if ($profile->avatar)
                                    <img src="{{ $profile->avatar }}" alt="{{ $profile->avatar }}"
                                        class="mx-auto d-flex justify-content-center align-items-center abatar-pf-edit">
                                @else
                                    <img src="{{ asset('images\profile_sample1.png') }}" alt=""
                                        class="mx-auto d-flex justify-content-center align-items-center abatar-pf-edit">
                                @endif
                            </div>

                            {{-- Abatar Upload --}}
                            <div class="m-0 col-auto align-self-start">
                                <input type="file" name="avatar" id="avatar"
                                    class="form-control form-control-sm mt-1" aria-describedby="avatar-info">
                                <div class="form-text" id="avatar-info">
                                    <p class="mb-0 small">
                                        Acceptable formats are jpeg, jpg, png and gif only.<br>
                                        Maximum file size is 1048kb.
                                    </p>
                                </div>

                                <!-- Error -->
                                @error('avatar')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Profile Entry Form --}}
                        <div class="col-md-6 col-12">
                            <div class="row">
                                {{-- First name --}}
                                <div class="mb-2">
                                    <label for="first_name" class="form-label fw-bold mb-0">
                                        <h6>
                                            First name
                                        </h6>
                                    </label>
                                    <input type="text" name="first_name" id="first_name" class="form-control"
                                        placeholder="First name" value="{{ old('first_name', $profile->first_name) }}">

                                    <!-- Error -->
                                    @error('first_name')
                                        <p class="text-danger small">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Midle name --}}
                                <div class="mb-2">
                                    <label for="middle_name" class="form-label fw-bold mb-0">
                                        <h6>
                                            Midle name
                                        </h6>
                                    </label>
                                    <input type="text" name="middle_name" id="middle_name" class="form-control"
                                        placeholder="Midle name" value="{{ old('middle_name', $profile->middle_name) }}">

                                    <!-- Error -->
                                    @error('middle_name')
                                        <p class="text-danger small">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Last name --}}
                                <div class="mb-2">
                                    <label for="last_name" class="form-label fw-bold mb-0">
                                        <h6>
                                            Last name
                                        </h6>
                                    </label>
                                    <input type="text" name="last_name" id="last_name" class="form-control"
                                        placeholder="Last name" value="{{ old('last_name', $profile->last_name) }}">

                                    <!-- Error -->
                                    @error('last_name')
                                        <p class="text-danger small">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- Date of Birth --}}
                            <div class="mb-2">
                                <label for="birth_date" class="form-label fw-bold  mb-0">
                                    <h6>
                                        Date of Birth
                                    </h6>
                                </label>
                                <input type="date" name="birth_date" id="birth_date" class="form-control"
                                    placeholder="YYYY/MM/DD" value="{{ old('birth_date', $profile->birth_date) }}">
                                <!-- Error -->
                                @error('birth_date')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Language --}}
                            <div class="mb-2">
                                <label for="language" class="form-label fw-bold mb-0">
                                    <h6>Language</h6>
                                </label>
                                <select name="language" id="language" class="form-control">
                                    @foreach ($languages as $key => $value)
                                        <option value="{{ $key }}"
                                            {{ old('language', $profile->language) == $key ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>

                                <!-- Error -->
                                @error('language')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4 justify-content-start align-self-end">
                        {{-- Introduction --}}
                        <div class="col">
                            {{-- Introduction -Title --}}
                            <label for="introduction" class="form-label fw-bold">
                                <h6>Introduction</h6>
                            </label>
                            {{-- Introduction -Text --}}
                            <textarea name="introduction" id="introduction" rows="12" class="form-control mx-auto"
                                placeholder="Describe yourself" autofocus>{{ $profile->introduction }}</textarea>

                            <!-- Error -->
                            @error('introduction')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Update Button --}}
                    <div class="row mb-3">
                        <div class="col">
                            <button type="submit" class="btn btn-kurenai btn-lg w-100">
                                Update profile
                            </button>
                        </div>
                    </div>
                </form>

                {{-- Delete Account --}}
                <div class="row mb-5">
                    <div class="col">
                        <button class="btn btn-white-pf btn-lg w-100" data-bs-toggle="modal"
                            data-bs-target="#deleteAccountModal-{{ $profile->user->id }}">
                            Delete Account
                        </button>

                        <!-- Include the modal here-->
                        @include('components.delete-account-modal')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
